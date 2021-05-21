<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){

        $movies = Movie::orderBy('id','asc')->get();
        return view('pages.landing_page', [
            'movies' => $movies,
        ]);
    }
}
