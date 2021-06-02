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


    protected $fillable = [
        'text',
        'user_id',
        'review_id',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
