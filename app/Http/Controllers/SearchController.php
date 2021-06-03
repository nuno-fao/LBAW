<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const ERROR_404_PAGE = 'errors.404';
    public function index(Request $request)
    {
        $query = "";
        if($request->has('query')){
            $query = $request->input('query');
        }
        $users = User::where("username", "like" ,"%".$query."%" )->take(10)->get();
        return view("pages/search",["users" => $users]);
    }
}
