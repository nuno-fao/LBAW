<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;
    

    protected $fillable = [
        'signed_user_id1',
        'signed_user_id2',
        'friendship_state'
    ];
}
