<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;

class ReviewController extends Controller
{
    static public function movieReviews(Movie $movie,int $page)
    {   
        return Review::where('movie',$movie->id)->orderBy('date', 'DESC')->skip($page)->take(10)->get();
    }
}
