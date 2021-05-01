<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){

        $movies = Movie::get();
        return view('landing_page', [
            'movies' => $movies,
        ]);
    }
}
