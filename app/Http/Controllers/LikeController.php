<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Like;

class LikeController extends Controller
{
    public function create($review_id)
    {
        if (!ctype_digit($review_id)) {
            abort(404);
        }

        $r = Review::find($review_id);

        if (!ctype_digit($review_id)) {
            return view('errors.404');
        }

        $this->authorize('like', $r);

        if ($r != null) {
            $l = Like::where('user_id', '=', Auth()->user()->id)->where('review_id', '=', $review_id)->get();

            if (count($l) == 1) {
                $l[0]->delete();
            } else {
                $r->likes()->create([
                    'user_id' => Auth()->user()->id,
                    'review_id' => $review_id
                ]);
            }
        }
        return response('', 200)->header('Content-Type', 'text/plain');
    }
}
