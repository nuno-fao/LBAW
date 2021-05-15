<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){

        $reviews = Review::orderBy('date','DESC')->take(10)->get();
        return view('pages.feed', [
            'reviews' => $reviews,
        ]);
    }

    public function getPublicPage($page)
    {
      if( !ctype_digit($page)){
        return view(self::ERROR_404_PAGE);
      }
      $r = Review::where('group_id')->orderBy('date','desc')->orderBy('title')->orderBy('text')->skip($page*10)->take(10)->get();
      return view('pagination.feed', ['reviews' => $r]);
    }
}
