<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function movie_page(){

        $movies = Movie::all();

        return view('pages.movies_dashboard', [
            'movies' => $movies
        ]);
    }

    public function review_page(){

        $reviews = Review::all();

        return view('pages.reviews_dashboard', [
            'reviews' => $reviews
        ]);
    }
}
