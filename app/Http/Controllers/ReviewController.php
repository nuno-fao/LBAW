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
      $this->review->movie = $this->getMovie($id);
      $this->review->user = $this->getUser($r);
      $this->review->comments = $this->getComments($id);
      $this->review->likes = $this->getLikes($id);

      //TODO ADD GROUP

      return view('pages.review',['review'=>$this->review]);
    }
    
    static public function movieReviews(Movie $movie,int $page)
    {   
        
        $r = Review::where('movie',$movie->id)->where('group')->orderBy('date', 'DESC')->skip($page*10)->take(10)->get();
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
        $c = Comment::where('review',$review)->orderBy('date')->get();
        foreach($c as $comment){
            $comment->user = CommentController::getUser($comment->author);
        }
        return $c;
    }

    static public function getLikes ($review)
    {   
        return Like::where('review',$review)->count();
    }

    static public function getUser ($review)
    {   
        return User::find($review->user_id);
    }
    
    public function store(Request $request){

      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
      ]);


      $request->user()->reviews()->create([
        'title' => $request->title,
        'text' => $request->description,
        'date' => date('Y-m-d H:i:s'),
        'movie' => $request->id,
        'group' => $request->group,
        'user_id' => $request->user()->id,
       
      ]);

      return back();

    }

}
