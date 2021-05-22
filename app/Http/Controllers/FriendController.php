<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function invite(Request $request, $user_id, $asker_id){

        //$this->authorize('create', Review::class);    

    
       Friend::create([
          'signed_user_id1' => $asker_id,
          'signed_user_id2' => $user_id
        ]);

        return back();
      }
}
