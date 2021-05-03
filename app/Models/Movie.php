<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movie';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;
    public $genres;
    public $reviews;
    public $myReviews;
    protected $fillable = [
        'title',
        'year',
        'photo'
    ];
}
