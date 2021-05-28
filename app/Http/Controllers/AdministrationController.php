<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function movie_page()
    {

      return view('pages.movies_dashboard');
    }
}
