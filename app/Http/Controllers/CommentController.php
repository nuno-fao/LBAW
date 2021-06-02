<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Comment;
use Illuminate\Http\Request;

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

    public function delete($comment_id){
       
        $comment = Comment::find($comment_id);

        $comment->delete();

        return back();
    }
}
