<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
  public function index()
  {

    $reviews = Review::where("group_id")->orderBy('date', 'DESC')->orderBy('title', 'DESC')->take(10)->get();
    $friend_reviews = null;
    $temp = collect();
    if (Auth::check()) {
      $friend_reviews = collect();
      foreach (auth()->user()->friends as $friend) {
        $friend_reviews =  $friend_reviews->concat($friend->reviews);
      }
      $friend_reviews = $friend_reviews->sortByDesc('title')->sortByDesc('date')->where('group_id', null)->take(10);
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
    $r = Review::where("group_id")->orderBy('date', 'DESC')->orderBy('title', 'DESC')->skip($page * 10)->take(10)->get();
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
    if (Auth::check()) {
      $friend_reviews = collect();
      foreach (auth()->user()->friends as $friend) {
        $friend_reviews = $friend_reviews->concat($friend->reviews);
      }
      $friend_reviews = $friend_reviews->sortByDesc('title')->sortByDesc('date')->where('group_id', null)->skip($page * 10)->take(10);
    }
    if ($friend_reviews->count() == 0) {
      return response('', 300)->header('Content-Type', 'text/plain');
    }
    return view('pagination.feed', ['reviews' => $friend_reviews]);
  }
}
