<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function invite(Request $request, $user_id){

        //$this->authorize('create', Review::class);
  
        // $r = Review::where('movie_id', $movie_id)->where('user_id', $request->user()->id)->where('group_id')->get();
        // if(count($r) != 0 && $request->group == null){
        //   return back();
        // }
  
        // $this->validate($request, [
        //   'title' => 'required',
        //   'description' => 'required',
        // ]);      
  
       Friend::create([
          'signed_user_id1' => $request->user()->id,
          'signed_user_id2' => $user_id,
          'friendship_state' => "pending",
        ]);
        
        return back();
      }
}
