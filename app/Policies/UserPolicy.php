<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;
    
    public function ban(User $user, User $target)
    {
      // Only a admin  can ban it
      return $user->admin && $target != $user;
    }

    public function edit(User $user, User $target)
    {
      // Only a user can edit its own information
      return $target == $user;
    }

    public function delete(User $user, User $target)
    {
      // Only a user can delete its own account
      return $target == $user;
    }

    public function admin_actions(User $user)
    {
      return $user->admin;
    }


}
