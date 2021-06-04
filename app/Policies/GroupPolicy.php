<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {

        return Auth::check();
    }

    public function invite(User $user, Group $group)
    {
        return $group->members()->where('membership_state', 'accepted')->get()->contains($user);
    }

    public function invite_user(User $user, Group $group, User $target)
    {
        return ($group->members->contains($user) && (!$group->members->contains($target)));
    }

    public function accept_invite(User $user, Group $group, User $target)
    {

        return ($group->members()->where('membership_state', 'pending')->get()->contains($target));
    }

    public function reject_invite(User $user, Group $group, User $target)
    {

        return ($group->members()->where('membership_state', 'pending')->get()->contains($target));
    }

    public function delete(User $user, Group $group)
    {

        return ($user->isAdminOf($group));
    }

    public function leave(User $user, Group $group)
    {

        return $group->members()->where('membership_state', 'accepted')->get()->contains($user);
    }

    public function see(User $user, Group $group)
    {

        return $group->members()->where('membership_state', 'accepted')->get()->contains($user);
    }

    public function view(){
        return Auth::check();
    }
}
