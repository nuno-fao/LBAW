<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReviewPolicy
{
    use HandlesAuthorization;
    
    public function create()
    {
      // Any user can list its own cards
      return Auth::check();
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
}
