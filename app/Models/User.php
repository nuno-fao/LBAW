<?php

namespace App\Models;

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
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class,'signed_user_id')->orderBy('date','DESC');
    }
}
