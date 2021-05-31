<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){

        $reviews = $user->reviews()->with(['user'])->orderBy('date','DESC')->paginate(10);
        
        return view('pages.user_profile', [
            'user' => $user,
            'reviews' => $reviews
        ]);
    }

    public function ban(User $user){

        $this->authorize('ban', $user);
        if (!$user->banned){
            $user->banned = true;
            $user->save();
        }
    }

    public function unban(User $user){

        $this->authorize('ban', $user);
        if ($user->banned){
            $user->banned = false;
            $user->save();
        }
    }

    public function edit_page($user_id){

        $user = User::find($user_id);
        
        return view('pages.edit_user', [
            'user' => $user
        ]);
    }

    
}
