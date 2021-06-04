<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const ERROR_404_PAGE = 'errors.404';

    //Returns search result page
    public function index(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->input('query');
        }
        $r_query = Review::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');
        $g_query = Group::where("title", "ilike", "%" . $query . "%");
        $u_query = User::where("username", "ilike", "%" . $query . "%")->orWhere("name", "ilike", "%" . $query . "%");
        $m_query = Movie::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');


        $users_count = $u_query->count();
        $groups_count = $g_query->count();
        $reviews_count = $r_query->count();
        $movies_count = $m_query->count();

        $r = "search_user";

        if ($users_count != 0) {
            $r = "search_user";
        } elseif ($groups_count != 0) {
            $r = 'search_group';
        } elseif ($reviews_count != 0) {
            $r = 'search_review';
        } elseif ($movies_count != 0) {
            $r = 'search_movie';
        }
        return redirect()->route($r, ['query' => $query]);
    }

    public function user(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->input('query');
        }
        $r_query = Review::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');
        $g_query = Group::where("title", "ilike", "%" . $query . "%");
        $u_query = User::where("username", "ilike", "%" . $query . "%")->orWhere("name", "ilike", "%" . $query . "%");
        $m_query = Movie::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');


        $users_count = $u_query->count();
        $groups_count = $g_query->count();
        $reviews_count = $r_query->count();
        $movies_count = $m_query->count();

        $users = $u_query->get();

        return view("pages/search_user", ["query" => $query, "users" => $users, 'users_count' => $users_count, 'groups_count' => $groups_count, 'reviews_count' => $reviews_count, 'movies_count' => $movies_count]);
    }

    public function group(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->input('query');
        }
        $r_query = Review::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');
        $g_query = Group::where("title", "ilike", "%" . $query . "%");
        $u_query = User::where("username", "ilike", "%" . $query . "%")->orWhere("name", "ilike", "%" . $query . "%");
        $m_query = Movie::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');


        $users_count = $u_query->count();
        $groups_count = $g_query->count();
        $reviews_count = $r_query->count();
        $movies_count = $m_query->count();

        $groups = $g_query->get();

        return view("pages/search_group", ["query" => $query, "groups" => $groups, 'users_count' => $users_count, 'groups_count' => $groups_count, 'reviews_count' => $reviews_count, 'movies_count' => $movies_count]);
    }

    public function movie(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->input('query');
        }
        $r_query = Review::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');
        $g_query = Group::where("title", "ilike", "%" . $query . "%");
        $u_query = User::where("username", "ilike", "%" . $query . "%")->orWhere("name", "ilike", "%" . $query . "%");
        $m_query = Movie::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');

        $users_count = $u_query->count();
        $groups_count = $g_query->count();
        $reviews_count = $r_query->count();
        $movies_count = $m_query->count();

        $movies = $m_query->get();

        return view("pages/search_movie", ["query" => $query, "movies" => $movies, 'users_count' => $users_count, 'groups_count' => $groups_count, 'reviews_count' => $reviews_count, 'movies_count' => $movies_count]);
    }

    public function review(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->input('query');
        }
        $r_query = Review::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');
        $g_query = Group::where("title", "ilike", "%" . $query . "%");
        $u_query = User::where("username", "ilike", "%" . $query . "%")->orWhere("name", "ilike", "%" . $query . "%");
        $m_query = Movie::selectRaw("*, ts_rank_cd(tt, plainto_tsquery(?)) AS rank", [$query])->whereRaw("plainto_tsquery(?) @@ tt", [$query])->orderBy('rank', 'DESC');


        $users_count = $u_query->count();
        $groups_count = $g_query->count();
        $reviews_count = $r_query->count();
        $movies_count = $m_query->count();

        $reviews = $r_query->get();

        return view("pages/search_review", ["query" => $query, "reviews" => $reviews, 'users_count' => $users_count, 'groups_count' => $groups_count, 'reviews_count' => $reviews_count, 'movies_count' => $movies_count]);
    }
}
