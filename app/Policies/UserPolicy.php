<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;
    
    public function ban(User $user,User $target)
    {
      // Only a admin  can ban it
      return $user->admin && $target != $user;
    }
}
