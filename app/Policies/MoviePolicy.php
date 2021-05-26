<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class MoviePolicy
{
    use HandlesAuthorization;

    public function show_add_page()
    {
      // Any user can list its own cards

      return $user->admin;
    }

    public function create()
    {
      // Any user can list its own cards
      return $user->admin;
    }

    public function delete(User $user)
    {
      // Only a card owner can delete it
      return $user->admin;
    }

    public function edit(User $user)
    {
      // Only a card owner can delete it
      return $user->admin;
    }
    
}
