<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class CommentController extends Controller
{
    static public function getUser ($author)
    {   
        return User::find($author);
    }

    public function create(Request $request, $review_id){
        
        $request->user()->comments()->create([
            'text' => $request->text,
            'date' => date('Y-m-d H:i:s'),
            'review_id' => $review_id
        ]);

        return back();
    }
}
