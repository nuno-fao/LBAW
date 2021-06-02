<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;


    
    public function view(User $user)
    {
        return Auth::check();
    }

 
}
