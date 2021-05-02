<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    private Movie $movie;
    public function show($id)
    {
      $r = Movie::find($id);
      if ($r == null){
        return redirect('/');
        
      }
      $this->movie = $r;
      $this->movie->genres = $this->getGenres($id);
      $this->movie->reviews = ReviewController::movieReviews($this->movie,0);
      return view('pages.movie', ['movie' => $this->movie]);
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
      return DB::select('SELECT genre.genre FROM genre INNER JOIN movie_genre ON genre.id = movie_genre.genre INNER JOIN movie ON movie_genre.movie = movie.id WHERE (movie.id = :id) ',['id' => $this->movie->id]);
    }
}
