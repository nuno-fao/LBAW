<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){

        $reviews = Review::get();
        return view('pages.feed', [
            'reviews' => $reviews,
        ]);
    }
}
