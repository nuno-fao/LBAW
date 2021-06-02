<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

Use Exception;

class CommentController extends Controller
{
    static public function getUser ($author)
    {   
        return User::find($author);
    }

    public function create(Request $request, $review_id){
        
        try{
            $comment = $request->user()->comments()->create([
                'text' => $request->text,
                'date' => date('Y-m-d H:i:s'),
                'review_id' => $review_id
            ]);
        }
        catch(Exception $e){
            return response('text too short', 500)->header('Content-Type', 'text/plain');
        }
      return view('partials.comment',['comment'=>$comment]);
    }
}
