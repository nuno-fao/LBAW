<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;

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
        $users_count = User::where("username", "ilike" ,"%".$query."%" )->orWhere("name", "ilike" ,"%".$query."%" )->count();
        $groups_count = Group::where("title", "ilike" ,"%".$query."%" )->count();

        $users = User::where("username", "ilike" ,"%".$query."%" )->orWhere("name", "ilike" ,"%".$query."%" )->take(10)->get();
        $groups = Group::where("title", "ilike" ,"%".$query."%" )->take(10)->get();
        
        return view("pages/search",["users" => $users,'groups' => $groups,'users_count' => $users_count,'groups_count' => $groups_count]);
    }
}
