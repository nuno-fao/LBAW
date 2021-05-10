<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){

        $reviews = Review::get();
        
        return view('pages.user_profile', [
            'user' => $user,
            'reviews' => $reviews
        ]);
    }
}
