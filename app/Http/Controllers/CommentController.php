<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class CommentController extends Controller
{
    static public function getUser ($author)
    {   
        return User::find($author);
    }
}
