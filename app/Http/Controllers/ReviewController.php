<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Group;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
	//Gets review info
	public function getInfo(Request $request)
	{
		$group_id = $request->get("group");
		$movie_id = $request->get("movie");

		if (!is_numeric($group_id)) {
			return view('errors.404');
		}
		if ($group_id == -1) {
			$r = Review::where('user_id', auth()->user()->id)->where('group_id')->where("movie_id", $movie_id)->first();
		} else {
			$r = Review::where('user_id', auth()->user()->id)->where('group_id', $group_id)->where("movie_id", $movie_id)->first();
		}

		if ($r == null) {
			return response('notFound', 200)->header('Content-Type', 'text/plain');
		}
		return $r;
	}

	//Shows a review
	public function show($id)
	{
		if (!ctype_digit($id)) {
			return view('errors.404');
		}
		$review = Review::find($id);

		if ($review == null) {
			return redirect('/');
		}

		//TODO ADD GROUP

		return view('pages.review', ['review' => $review]);
	}

	static public function movieReviews(Movie $movie, int $page)
	{
		return Review::where('movie_id', $movie->id)->orderBy('date', 'desc')->skip($page * 10)->take(10)->get();
	}

	//Creates a review
	public function create(Request $request, $movie_id)
	{

		if (!ctype_digit($movie_id)) {
			abort(404);
		}
		if ($request->group != -1) {
			$this->authorize('create', [Review::class, $request->group]);
		} else {
			$this->authorize('create', [Review::class, null]);
		}

		if ($request->group != -1) {
			if (!is_numeric($request->group)) {
				abort(404);
			}
			$r = Review::where('movie_id', $movie_id)->where('user_id', $request->user()->id)->where('group_id', $request->group)->get();
		} else {
			$r = Review::where('movie_id', $movie_id)->where('user_id', $request->user()->id)->where('group_id')->get();
		}

		if (count($r) != 0) {
			return response('alreadyExists', 200)->header('Content-Type', 'text/plain');
		}

		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
		]);

		$review = $request->user()->reviews()->create([
			'title' => $request->title,
			'text' => $request->description,
			'date' => date('Y-m-d H:i:s'),
			'movie_id' => $request->id
		]);

		if ($review != null && $request->group != null && $request->group != -1) {

			$group = Group::find($request->group);

			$review->group()->associate($group);

			$review->save();
		}
		return view("partials.review", ["review" => $review]);
	}

	//Deletes a review
	public function delete(Request $request, $review_id)
	{
		if (!ctype_digit($review_id)) {
			abort(404);
		}
		$r = Review::find($review_id);

		$this->authorize('delete', $r);

		if ($r != null) {
			$r->delete();
		}
	}

	public function getReview($review_id)
	{
		if (!ctype_digit($review_id)) {
			abort(404);
		}
		return Review::find($review_id);
	}

	//Edits a review
	public function edit(Request $request, $review_id)
	{
		if (!is_numeric($review_id)) {
			abort(404);
		}
		$r = Review::find($review_id);

		try {
			$this->validate($request, [
				'title' => 'required',
				'description' => 'required',
			]);
		} catch (Exception $e) {
			return response('error', 200)->header('Content-Type', 'text/plain');
		}

		$this->authorize('edit', $r);

		if ($r != null) {
			$r->text = $request->description;
			$r->title = $request->title;
			$r->save();
		}
		return view("partials.review", ["review" => $r]);
	}
}
