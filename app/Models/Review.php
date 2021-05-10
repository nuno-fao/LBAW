<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $primaryKey = 'id';

   
    

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
}
