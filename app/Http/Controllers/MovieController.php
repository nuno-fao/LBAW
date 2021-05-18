<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ReviewController;

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

    public function add_page(){


      return view('pages.add_movie');
    }

    /**
     * Creates a new movie.
     *
     * @return Movie The movie created.
     */
    public function create(Request $request)
    {   
      
      $this->validate($request, [
        'movieName' => 'required',
        'year' => 'required',
        'movieDescription' => 'required',
        'moviePoster' => 'required|image'
      ]);

      $imageName = time().'.'.$request->moviePoster->extension();  
     
      $request->moviePoster->move(public_path('img'), $imageName);
        
      $movie = Movie::create([
          'title' => $request->movieName,
          'year' => $request->year,
          'description' => $request->movieDescription,
          'photo' => 'img/'.$imageName,
        ]);
      
        if($movie)
        {        
            $tagNames = explode(',',$request->get('tags'));
            $tagIds = [];
            foreach($tagNames as $tagName)
            {
                
                $tag = Genre::firstOrCreate(['genre'=>$tagName]);
                if($tag)
                {
                  $tagIds[] = $tag->id;
                }
    
            }
            $movie->genres()->sync($tagIds);
        }

    
      return redirect()->route('landing_page');
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
