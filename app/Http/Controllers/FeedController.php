<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){

        $reviews = Review::orderBy('date','DESC')->get();
        return view('pages.feed', [
            'reviews' => $reviews,
        ]);
    }
}
