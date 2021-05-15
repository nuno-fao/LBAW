<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReviewPolicy
{
    use HandlesAuthorization;
    
    public function create(User $user)
    {
      // Any user can list its own cards
      return Auth::check();
    }

    public function delete(User $user, Review $review)
    {
      // Only a card owner can delete it
      return $user->id == $review->user_id || $user->admin == true ;
    }

    public function edit(User $user, Review $review)
    {
      // Only a card owner can delete it
      return $user->id == $review->user_id;
    }
}
