<?php

namespace App\Models;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'report';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'signed_user_id',
        'review_id'
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'signed_user_id');
    }
}
