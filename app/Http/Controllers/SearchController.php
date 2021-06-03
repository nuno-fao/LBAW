<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Review;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const ERROR_404_PAGE = 'errors.404';
    public function index(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->input('query');
        }
        $r_query = Review::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');
        $g_query = Group::where("title", "ilike", "%" . $query . "%");
        $u_query = User::where("username", "ilike", "%" . $query . "%")->orWhere("name", "ilike", "%" . $query . "%");

        $users_count = $u_query->count();
        $groups_count = $g_query->count();
        $reviews_count = $r_query->count();

        $reviews = $r_query->take(10)->get();
        $users = $u_query->take(10)->get();
        $groups = $g_query->take(10)->get();

        return view("pages/search", ["query" => $query, "users" => $users, 'groups' => $groups, 'reviews' => $reviews, 'users_count' => $users_count, 'groups_count' => $groups_count, 'reviews_count' => $reviews_count]);
    }
}
