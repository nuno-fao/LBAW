<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class MoviePolicy
{
    use HandlesAuthorization;
    
}
