<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{

  //Returns a page with a list of the friends of the user
  public function show_list($user_id)
  {

    $user = User::find($user_id);
    $friends = $user->friends;


    return view('pages.friends_page', [
      'user' => $user,
      'friends' => $friends
    ]);
  }

  //Sends a friend request to a user
  public function invite(Request $request, $user_id, $asker_id)
  {

    if (!ctype_digit($user_id)) {
      abort(404);
    }
    if (!ctype_digit($asker_id)) {
      abort(404);
    }
    $asker = User::find($asker_id);

    $this->authorize('invite', [Friend::class, $asker]);

    Friend::create([
      'signed_user_id1' => $asker_id,
      'signed_user_id2' => $user_id
    ]);

    return back();
  }

  //Accept a friend request
  public function accept(Request $request, $user_id, $asker_id)
  {

    if (!ctype_digit($user_id)) {
      abort(404);
    }
    if (!ctype_digit($asker_id)) {
      abort(404);
    }
    $asker = User::find($asker_id);

    $this->authorize('accept', [Friend::class, $asker]);

    $friendship = Friend::where('signed_user_id1', $asker_id)
      ->where('signed_user_id2', $user_id)->first();

    if ($friendship != null) {
      $friendship->friendship_state = 'accepted';
      $friendship->save();

      $notification = User::find($user_id)->notifications()->where('friend_id', $asker_id);
      $notification->delete();
    }

    return back();
  }

  //Rejects a friend request
  public function reject(Request $request, $user_id, $asker_id)
  {

    if (!ctype_digit($user_id)) {
      abort(404);
    }
    if (!ctype_digit($asker_id)) {
      abort(404);
    }
    $asker = User::find($asker_id);

    $this->authorize('reject', [Friend::class, $asker]);

    $friendship = Friend::where('signed_user_id1', $asker_id)
      ->where('signed_user_id2', $user_id)->first();

    if ($friendship != null) {
      $friendship->friendship_state = 'rejected';
      $friendship->save();

      $notification = User::find($user_id)->notifications()->where('friend_id', $asker_id);
      $notification->delete();
    }

    return back();
  }

  //Cancels a friend request
  public function cancel(Request $request, $asker_id, $user_id)
  {

    if (!ctype_digit($user_id)) {
      abort(404);
    }
    if (!ctype_digit($asker_id)) {
      abort(404);
    }
    $asker = User::find($user_id);

    $this->authorize('cancel', [Friend::class, $asker]);


    $friendship = Friend::where('signed_user_id1', $asker_id)
      ->where('signed_user_id2', $user_id)->first();


    if ($friendship != null) {
      $friendship->delete();

      $notification = User::find($user_id)->notifications()->where('friend_id', $asker_id);
      $notification->delete();
    }

    return back();
  }
}
