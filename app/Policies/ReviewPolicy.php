<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;
    
    public function create(User $user, $group_id)
    {

      if($group_id == null){
        return Auth::check();
      }
      
      $group = Group::find($group_id);

      return $user->groups()->get()->contains($group);
    }

    public function delete(User $user, Review $review)
    {
      // Only a card owner can delete it
      return $user->id == $review->user_id || $user->admin ;
    }

    public function edit(User $user, Review $review)
    {
      // Only a card owner can delete it
      return $user->id == $review->user_id;
    }

    public function like()
    {
      // Only a card owner can delete it
      return Auth::check();
    }

    public function report(User $user, $review)
    {
      return ($review->user() != $user);
      //return Auth::check();
    }

    public function see(){
      return Route::currentRouteName() !== 'review';
    }
}
