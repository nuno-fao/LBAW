<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id)
    {
      $movie = Movie::find($id);
      $this->authorize('show', $movie);
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
}
