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
      $r = Review::find($id);

      if ($r == null){
        return redirect('/');
        
      }

      $this->review = $r;
      $this->review->moviep = $this->getMovie($r->movie);
      $this->review->likes = $this->getLikes($id);

      //TODO ADD GROUP

      return view('pages.review',['review'=>$this->review]);
    }
    
    static public function movieReviews(Movie $movie,int $page)
    {   
        
        $r = Review::where('movie_id',$movie->id)->where('group_id')->orderBy('date','desc')->orderBy('title')->orderBy('text')->skip($page*10)->take(10)->get();
        foreach($r as $aux){
            $aux->user = ReviewController::getUser($aux);
            $aux->likes = ReviewController::getLikes($aux->id);
            $aux->comments = ReviewController::getComments($aux->id);
        }
        return $r;
    }

    static public function getMovie($movie)
    {   
        return Movie::find($movie);
    }

    static public function getComments ($review)
    {   
        $c = Comment::where('review_id',$review)->orderBy('date')->get();
        foreach($c as $comment){
            $comment->user = CommentController::getUser($comment->user_id);
        }
        return $c;
    }

    static public function getLikes ($review)
    {   
        return Like::where('review_id',$review)->count();
    }

    static public function getUser ($review)
    {   
        return User::find($review->user_id);
    }

    public function create(Request $request,$movie_id){


      $n_review = new Review();

      $this->authorize('create', Review::class);

      $r = Review::where('movie', $movie_id)->where('user_id', $request->user()->id)->where('group')->get();
      if(count($r) != 0 && $request->group == null){
        return back();
      }

      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
      ]);

      

      $request->user()->reviews()->create([
        'title' => $request->title,
        'text' => $request->description,
        'date' => date('Y-m-d H:i:s'),
        'movie' => $request->id,
        'group' => $request->group
      ]);

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
