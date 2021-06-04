<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieListController extends Controller
{

  const ERROR_404_PAGE = 'errors.404';

  //Returns a page with a list of movies
  public function show()
  {

    $ms = Movie::take(12)->get();

    return view('pages.movie_list', [
      'movies' => $ms
    ]);
  }

  public function getMovieListPage($page)
  {
    if (!ctype_digit($page)) {
      return view(self::ERROR_404_PAGE);
    }
    $ms =  Movie::skip($page * 12)->take(12)->get();

    return view('pagination.movie_list', ['movies' => $ms]);
  }
}
