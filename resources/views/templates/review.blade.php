<div class="card-header row review-header ">
    <div class="col col-12 col-lg-9 no-padding">
        {{$review->title}}
    </div>
    <div class="col col-12 col-lg-3 review-author no-padding">
        <a class="btn text-dark" href="#">
            by {{$review->user->username}}
        </a> 
        @can('delete',$review)
            <button class="btn btn-primary" id="deleteButton">
                Delete
            </button>    
            
        @endcan   
        @can('report',$review)              
            <button class="btn btn-primary"   @if(auth()->user()->reported()->get()->contains('review_id',$review->id) && auth()->user()->reported()->get()->contains('signed_user_id',auth()->user()->id)) disabled @endif>
                Report
            </button>  
        @endcan
            
        
    </div>
    <div class="col col-12 no-padding">
        <small col>
            {{$review->date}}
        </small>
    </div>
</div>
<div class="card-body d-flex flex-column ">
    {{$review->text}}
</div>
<div class="card-footer d-flex d-flex justify-content-between review-footer">
    <div class="no-padding">
        <i id="like_button_{{$review->id}}" class="like_button fa fa-thumbs-up"> </i>
        <span id="likes_{{$review->id}}">{{$review->likes->count()}}</span>
    </div>
    <a class="btn" data-toggle="collapse" href="#comments{{$review->id}}" role="button" aria-expanded="false"
        aria-controls="comments{{$review->id}}"> 
        {{$review->comments->count()}} comments 
    </a>
</div>

 <div class="comment-section mt-3 collapse" id="comments{{$review->id}}">
    @if($review->comments->count() > 0)
        @each('partials.comment',$review->comments,'comment')
    @endif
    @auth
    <form class="add-comment" action="{{ route('add_comment',['id' => $review->id]) }}"  method="POST">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Add a commment</label>
            <div class=" d-flex ">
                <textarea class="form-control comment-textarea" name="text" id="exampleFormControlTextarea1"
                    rows="1"></textarea>
                <button class="btn btn-primary ms-3">
                    Send
                </button>
            </div>
        </div>
    </form>
    @endauth
</div>     