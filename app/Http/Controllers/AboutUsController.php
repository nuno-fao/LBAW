<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AboutUsController extends Controller
{
    //Returns page with "about us" information
    public function show(){
        
        return view('pages.about_us');
    }
}
