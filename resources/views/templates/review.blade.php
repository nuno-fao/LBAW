<div class="card-header row review-header ">
    <span class="col col-12 col-lg-4 d-flex align-items-center">
        {{$review->title}}
    </span>
    <div class="col col-12 col-lg-8 d-flex justify-content-end review-author no-padding">
        <div class="text-dark d-flex align-items-center">
            {{\Carbon\Carbon::now()->diffForHumans()}}
        </div> 
        <a class="btn" href="{{route('user',['user' => $review->user->id])}}">
            by {{$review->user->username}} 
        </a> 

        
        @can('delete',$review)
            <button class="btn btn-primary ms-1" onclick="deleteReview('review_{{$review->id}}',{{$review->id}})">
                Delete
            </button>    
            
        @endcan   
        @can('report',$review)              
            <button class="btn btn-primary ms-1 report_button"  onclick="reportReview('review_{{$review->id}}',{{$review->id}})"  @if(auth()->user()->reported()->get()->contains('review_id',$review->id) && auth()->user()->reported()->get()->contains('signed_user_id',auth()->user()->id)) disabled @endif>
                Report
            </button>  
        @endcan    
        @can('see',$review)    
        <button class="btn btn-primary ms-1"  onclick="location.href='{{route('review',[$review->id])}}'">
            See 
        </button>
        @endcan  
    </div>
</div>
<div class="card-body d-flex flex-column ">
    {{$review->text}}
</div>
<div class="card-footer d-flex justify-content-between review-footer">
    <div class="no-padding">
        <i id="like_button_{{$review->id}}" class="like_button fa fa-thumbs-up"> </i>
        <span id="likes_{{$review->id}}">{{$review->likes->count()}}</span>
    </div>
    <a class="btn py-0" data-toggle="collapse" href="#comments{{$review->id}}" role="button" aria-expanded="false"
        aria-controls="comments{{$review->id}}"> 
        {{$review->comments->count()}} comments 
    </a>
</div>

 <div class="comment-section mt-3 collapse" id="comments{{$review->id}}">
    @if($review->comments->count() > 0)
        @each('partials.comment',$review->comments,'comment')
    @endif
    @auth
        <div class="form-group">
            <label for="addCommentArea_{{$review->id}}">Add a commment</label>
            <div class=" d-flex ">
                <textarea class="form-control comment-textarea" name="text" id="addCommentArea_{{$review->id}}"
                    rows="1"></textarea>
                <button class="btn btn-primary ms-3" onclick="addComment({{$review->id}})">
                    Send
                </button>
            </div>
        </div>
    @endauth
</div>     