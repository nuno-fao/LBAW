<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
  public function index()
  {

    $reviews = Review::where("group_id")->orderBy('date', 'DESC')->take(10)->get();
    $friend_reviews = null;
    $temp = collect();
    if (Auth::check()) {
      $friend_reviews = collect();
      $aux = Auth::user()->getFriendsAttribute();
      foreach ($aux as $friend) {
        $friend_reviews = $temp->concat($friend->reviews);
        $temp = $friend_reviews;
      }
      $friend_reviews = $temp->where("group_id")->sortByDesc('date')->take(10);
    }
    return view('pages.feed', [
      'reviews' => $reviews, 'friend_reviews' => $friend_reviews
    ]);
  }

  public function getPublicPage($page)
  {
    if (!ctype_digit($page)) {
      return view(self::ERROR_404_PAGE);
    }
    $r = Review::where("group_id")->orderBy('date', 'desc')->skip($page * 10)->take(10)->get();
    if ($r->count() == 0) {
      return response('', 300)->header('Content-Type', 'text/plain');
    }
    return view('pagination.feed', ['reviews' => $r]);
  }

  public function getFriendPage($page)
  {
    if (!ctype_digit($page)) {
      return view(self::ERROR_404_PAGE);
    }

    $friend_reviews = null;
    $temp = collect();
    if (Auth::check()) {
      $aux = Auth::user()->getFriendsAttribute();
      foreach ($aux as $friend) {
        $friend_reviews = $temp->concat($friend->reviews);
        $temp = $friend_reviews;
      }
      $friend_reviews = $temp->where("group_id")->sortByDesc('date')->skip($page * 10)->take(10);
    }
    if ($friend_reviews->count() == 0) {
      return response('', 300)->header('Content-Type', 'text/plain');
    }
    return view('pagination.feed', ['reviews' => $friend_reviews]);
  }
}
