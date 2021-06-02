<?php

namespace App\Policies;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FriendPolicy
{
    use HandlesAuthorization;

    public function invite(User $user, User $target){

        return ((!$user->sentRequestTo($target)) && (!$user->friends->contains($target)) && (!$user->receivedRequestFrom($target)));
        
    }

    public function accept(User $user, User $target){

        return ($user->receivedRequestFrom($target));
        
    }

    public function reject(User $user, User $target){

        return ($user->receivedRequestFrom($target));
        
    }

    public function cancel(User $user, User $target){

        return ($user->sentRequestTo($target));
        
    }



    
}
