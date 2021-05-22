<?php

namespace App\Http\Controllers;

use App\Models\User;
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


      public function accept(Request $request, $user_id, $asker_id){

        //$this->authorize('create', Review::class);  
        //$this->authorize('edit', $r);  

        $friendship = Friend::where('signed_user_id1',$asker_id)
        ->where('signed_user_id2',$user_id)->first();  

        if($friendship != null){
          $friendship->friendship_state = 'accepted';
          $friendship->save();    

          $notification = User::find($user_id)->notifications()->where('friend_id',$asker_id);
          $notification->delete();
        }

        return back();
      }

      public function reject(Request $request, $user_id, $asker_id){

        //$this->authorize('create', Review::class);  
        //$this->authorize('edit', $r);  

        $friendship = Friend::where('signed_user_id1',$asker_id)
        ->where('signed_user_id2',$user_id)->first();  

        if($friendship != null){
          $friendship->friendship_state = 'rejected';
          $friendship->save();    

          $notification = User::find($user_id)->notifications()->where('friend_id',$asker_id);
          $notification->delete();
        }

        return back();
      }

      public function cancel(Request $request, $user_id, $asker_id){

        //$this->authorize('create', Review::class);  
        //$this->authorize('edit', $r);  
        

        $friendship = Friend::where('signed_user_id1',$asker_id)
        ->where('signed_user_id2',$user_id)->first();  

        
        if($friendship != null){
          $friendship->delete();    

          $notification = User::find($user_id)->notifications()->where('friend_id',$asker_id);
          $notification->delete();
        }

        return back();
      }
}
