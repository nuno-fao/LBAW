<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    private Movie $movie;
    const ERROR_404_PAGE = 'errors.404';
    public function show($id)
    {
      if(!ctype_digit($id)){
        return view(self::ERROR_404_PAGE);
      }
      $r = Movie::find($id);
      if ($r == null){
        return view(self::ERROR_404_PAGE);
        
      }
      $this->movie = $r;
      $this->movie->genres = $this->getGenres($id);
      $this->movie->reviews = ReviewController::movieReviews($this->movie,0);
      if(auth()->user() != null){
        $revs = Review::where('movie_id',$id)->where('user_id',auth()->user()->id)->where('group_id')->first();
      }
      else{ 
        $revs = null;
      }
      if($revs != null){
        $this->movie->myReviews = $revs->id;
      }
      else{
        $this->movie->myReviews = null;
      }

      return view('pages.movie', ['movie' => $this->movie]);
    }

    public function getPage($id,$page)
    {
      if(!ctype_digit($id) || !ctype_digit($page)){
        return view(self::ERROR_404_PAGE);
      }
      $r = Movie::find($id);
      if ($r == null){
        return view(self::ERROR_404_PAGE);
        
      }
      $this->movie = $r;
      $this->movie->genres = $this->getGenres($id);
      $this->movie->reviews = ReviewController::movieReviews($this->movie,$page);
      return view('pagination.movie', ['movie' => $this->movie]);
    }

    /**
     * Creates a new movie.
     *
     * @return Movie The movie created.
     */
    public function create(Request $request)
    {
      $movie = new Movie();
      $this->authorize('create', $movie);
      $movie->save();

      return $movie;
    }

    public function delete(Request $request, $id)
    {
      $movie = Movie::find($id);

      $this->authorize('delete', $movie);
      $movie->delete();

      return $movie;
    }

    private function getGenres(int $id){
      return DB::select('SELECT genre.genre FROM genre INNER JOIN movie_genre ON genre.id = movie_genre.genre_id INNER JOIN movie ON movie_genre.movie_id = movie.id WHERE (movie.id = :id) ',['id' => $this->movie->id]);
    }
}
