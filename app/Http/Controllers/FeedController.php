<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
    public function index(){

        $reviews = Review::orderBy('date','DESC')->take(10)->get();
        $friend_reviews = null;
        $temp = collect();
        if(Auth::check()){
          $friend_reviews = collect();
          $aux = Auth::user()->getFriendsAttribute();
          foreach($aux as $friend){
            $friend_reviews = $temp->concat($friend->reviews);
            $temp = $friend_reviews;
          }
          $friend_reviews = $temp->sortBy('date')->take(10);
        }
        return view('pages.feed', [
            'reviews' => $reviews, 'friend_reviews'=>$friend_reviews
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

    public function getFriendPage($page)
    {
      if( !ctype_digit($page)){
        return view(self::ERROR_404_PAGE);
      }

      $friend_reviews = null;
      $temp = collect();
      if(Auth::check()){
        $friend_reviews = collect();
        $aux = Auth::user()->getFriendsAttribute();
        foreach($aux as $friend){
          $friend_reviews = $temp->concat($friend->reviews);
          $temp = $friend_reviews;
        }
        $friend_reviews = $temp->sortBy('date')->skip($page*10)->take(10);
      }
      return view('pagination.feed', ['reviews' => $friend_reviews]);
    }
}
