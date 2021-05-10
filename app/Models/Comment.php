<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comment';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;

    public $user;

    protected $fillable = [
        'text',
        'user_id',
        'review_id',
        'date',
    ];
}
