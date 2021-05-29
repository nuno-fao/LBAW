<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Report;
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

        $reviews = collect();
        $reports = Report::all();

        foreach($reports as $report){
            $reviews->push($report->getReview());
        }

        return view('pages.reviews_dashboard', [
            'reviews' => $reviews
        ]);
    }

    public function user_page(){

        $users = User::all()->where('banned', true);

        return view('pages.user_dashboard', [
            'users' => $users
        ]);
    }
}
