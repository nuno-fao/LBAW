<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;

class ReviewController extends Controller
{
    static public function movieReviews(Movie $movie,int $page)
    {   
        return Review::where('movie',$movie->id)->where('group')->orderBy('date', 'DESC')->skip($page*10)->take(10)->get();
    }
}
