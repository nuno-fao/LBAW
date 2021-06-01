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


      return $user->admin;
    }

    public function create()
    {

      return $user->admin;
    }

    public function delete(User $user)

      return $user->admin;
    }

    public function edit(User $user)
    {

      return $user->admin;
    }
    
}
