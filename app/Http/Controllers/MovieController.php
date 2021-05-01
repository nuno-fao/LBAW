<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function show($id)
    {
      $movie = Movie::find($id);
      $this->getGenres($id,$movie);
      return view('pages.movie', ['movie' => $movie]);
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

    private function getGenres(int $id,Movie $movie){
      $movie->genres = DB::select('SELECT genre.genre FROM genre INNER JOIN movie_genre ON genre.id = movie_genre.genre INNER JOIN movie ON movie_genre.movie = movie.id WHERE (movie.id = :id) ',['id' => $id]);
    }
}
