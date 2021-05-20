<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'description',
        'year',
        'photo'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
