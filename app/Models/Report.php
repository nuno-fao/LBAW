<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getReview(){
        return Review::where('id',$this->review_id)->first();
    }
}
