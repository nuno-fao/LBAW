<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Auth;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect()->route('feed');
        }

        $movies = Movie::orderBy('id','asc')->get();
        return view('pages.landing_page', [
            'movies' => $movies,
        ]);
    }
}
