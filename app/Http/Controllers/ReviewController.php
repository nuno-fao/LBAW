<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;

class ReviewController extends Controller
{
    
    private Review $review;
    public function show($id)
    {
      if(!ctype_digit($id)){
        return view('errors.404');
      }
      $review = Review::find($id);

      if ($review == null){
        return redirect('/');
        
      }

      //TODO ADD GROUP

      return view('pages.review',['review'=>$review]);
    }
    
    static public function movieReviews(Movie $movie,int $page)
    {   
        
        return Review::where('movie_id',$movie->id)->where('group_id')->orderBy('date','desc')->orderBy('title')->orderBy('text')->skip($page*10)->take(10)->get();
    }

    public function create(Request $request,$movie_id){

      $this->authorize('create', Review::class);

      $r = Review::where('movie_id', $movie_id)->where('user_id', $request->user()->id)->where('group_id')->get();
      if(count($r) != 0 && $request->group == null){
        return back();
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

      if($review != null && $request->group != null){

        $group = Group::find($request->group);

        $review->group()->associate($group);
      }

      return back();
    }

    public function delete(Request $request,$review_id){
      $r = Review::find($review_id);

      $this->authorize('delete', $r);

      if($r != null){
        $r->delete();
      }
    }

    public function getReview($review_id){
      return Review::find($review_id);
    }

    public function edit(Request $request,$review_id){
      $r = Review::find($review_id);

      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
      ]);
      
      $this->authorize('edit', $r);

      if($r != null){
        $r->text = $request->description;
        $r->title = $request->title;       
        $r->save();    
      }
      return back();
    }
}
