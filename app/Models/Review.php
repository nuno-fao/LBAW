<?php

namespace App\Models;

use App\Models\Comment;
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
        'movie',
        'group',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

}
