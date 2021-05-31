<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'title',
        'description',
        'photo'
    ];

    public function admin(){
        return $this->belongsTo(User::class,'admin');
    }

    public function members(){
        return $this->belongsToMany(User::class, 'group_member');
    }
}
