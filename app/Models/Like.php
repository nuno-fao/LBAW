<?php

namespace App\Models;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'like';
    protected $primaryKey = 'user_id';

    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'review_id',
    ];

    public function review(){
        return $this->belongsTo(Review::class);
    }
}
