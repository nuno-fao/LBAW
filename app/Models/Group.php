<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'title',
        'description',
        'photo',
        'admin'
    ];

    public function admin(){
        return User::find($this->admin);
    }

    public function members(){
        return $this->belongsToMany(User::class, 'group_member');
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
