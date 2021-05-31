<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function list(){

        // $reviews = $user->reviews()->with(['user'])->orderBy('date','DESC')->paginate(10);
        
        return view('pages.groups_list'
        // , [
        //     'user' => $user,
        //     'reviews' => $reviews
        // ]
    );
    }

    public function add_group_page(){

        // $reviews = $user->reviews()->with(['user'])->orderBy('date','DESC')->paginate(10);
        
        return view('pages.add_group');
    }


}
