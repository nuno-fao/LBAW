<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    
    protected $table = 'notification';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function friend(){
        return $this->belongsTo(User::class,'friend_id');
    }

    public function group(){
       return $this->belongsTo(Group::class);
    }

    public function review(){
        return $this->belongsTo(Review::class);
    }

}

