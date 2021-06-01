<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Friend;
use App\Models\Report;
use App\Models\Review;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'signed_user';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'date_of_birth',
        'username', 
        'password',
        'photo',
        'banned'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments() {
        return $this->hasMany(Comment::class,'signed_user_id');
    }
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class,'signed_user_id')->orderBy('date','DESC');
    }

    public function reported(){
        return $this->hasMany(Report::class, 'signed_user_id');
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'group_member');
    }

    public function isAdminOf($group){
        return ($group->admin == $this->id);
    }

    public function hasBeenInvitedToGroup($group_id){

        $group= Group::find($group_id);

        return ($group->members->contains($this));
    }

    function friendsOfMine() {
        return $this->belongsToMany(User::class, Friend::class, 'signed_user_id1', 'signed_user_id2')
        // if you want to rely on accepted field, then add this:
        ->wherePivot('friendship_state', '=', "accepted");
    }

    // friendship that I was invited to 
    function friendOf(){
        return $this->belongsToMany(User::class, Friend::class, 'signed_user_id2', 'signed_user_id1')
        ->wherePivot('friendship_state', '=', "accepted");
    }

    // accessor allowing you call $user->friends
    public function getFriendsAttribute(){
        if ( ! array_key_exists('friends', $this->relations)){
            $friends = $this->friendsOfMine->merge($this->friendOf);
            $this->setRelation('friends', $friends);
        } 

        return $this->getRelation('friends');
    }

    function sentRequestTo($user) {

        return $this->belongsToMany(User::class, Friend::class, 'signed_user_id1', 'signed_user_id2')
        ->wherePivot('friendship_state', '=', "pending")
        ->wherePivot('signed_user_id2', '=', $user->id)
        ->orWhere('friendship_state', '=', "rejected")
        ->wherePivot('signed_user_id2', '=', $user->id)->count() > 0;
    }

    function receivedRequestFrom($user) {

        return $this->belongsToMany(User::class, Friend::class, 'signed_user_id2', 'signed_user_id1')
        ->wherePivot('friendship_state', '=', "pending")->wherePivot('signed_user_id1', '=', $user->id)->count() > 0;
    }

}
