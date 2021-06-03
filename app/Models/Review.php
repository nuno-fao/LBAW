<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;
    

    protected $fillable = [
        'id',
        'title',
        'text',
        'date',
        'movie_id',
        'group_id',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
    
    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

}
