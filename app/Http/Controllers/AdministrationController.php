<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function movie_page(){

        $movies = Movie::all();

        return view('pages.movies_dashboard', [
            'movies' => $movies
        ]);
    }
}
