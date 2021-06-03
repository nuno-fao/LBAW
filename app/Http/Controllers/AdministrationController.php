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

        $this->authorize('admin_actions', User::class);

        $movies = Movie::all();

        return view('pages.movies_dashboard', [
            'movies' => $movies
        ]);
    }

    public function review_page(){

        $this->authorize('admin_actions', User::class);

        $reviews = collect();
        $reports = Report::all();

        foreach($reports as $report){
            $reviews[] = $report->review;
        }

        return view('pages.reviews_dashboard', [
            'reviews' => $reviews->unique()
        ]);
    }

    public function user_page(){

        $this->authorize('admin_actions', User::class);

        $query = User::all();
        $users = $query->where('banned', true);
        $total = $query->count();

        return view('pages.user_dashboard', [
            'users' => $users,
            'total_users' => $total
        ]);
    }
}
