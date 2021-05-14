<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'like';
    protected $primaryKey = ['user','review'];

    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'review_id',
    ];
}
