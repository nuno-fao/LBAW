<div class="row align-items-center my-4">
    <div class="col col-12 col-lg-1">
    </div>

    <div class="my-auto me-2 col-12 col-lg-2">
        <div class=" d-flex flex-column flex-xl-row">
            <div>
                <p class="text-center badge bg-primary">
                    {{$review->movie->title}}
                </p>
            </div>
            <div>
                <p class="text-center badge bg-primary">
                    {{$review->movie->year}}
                </p>
            </div>
        </div>
        <a href="{{route('movie',[$review->movie])}}"><img class="card-img-top img-responsive review-poster" src="{{asset($review->movie->photo)}}" alt="movie poster"></a>
    </div>

    <div class="review card mt-3 col-12 col-lg-8 px-0">
        <div class="card-header row review-header" onclick="location.href='{{route('review',[$review->id])}}'">
            <div class="col col-12 col-lg-9 no-padding">
                {{$review->title}}</div>
            <div class="col col-12 col-lg-3 review-author no-padding">
                <a class="btn text-dark" href="#">{{--  REDIRECT TO USER PROFILE --}}
                    by {{$review->user->username}}
                </a>
            </div>
            <div class="col col-12 no-padding">
                <small col>
                    {{$review->date}}
                </small>
            </div>
        </div>
        <div class="review-body card-body d-flex flex-column" onclick="location.href='{{route('review',[$review->id])}}'">
            {{$review->text}}
        </div>
        <div class="card-footer d-flex d-flex justify-content-between review-footer">
            <div class="like_button no-padding">
                <i onclick="myFunction(this)" class="fa fa-thumbs-up"> {{$review->likes->count()}}</i>
            </div>
            <a class="btn" data-toggle="collapse" href="#comments{{$review->id}}" role="button" aria-expanded="false"
                aria-controls="comments{{$review->id}}">
                {{$review->comments->count()}} Comments
            </a>
        </div>
        <div class="comment-section mt-3 collapse" id="comments{{$review->id}}">
            @if($review->comments->count() > 0)
                @each('partials.comment',$review->comments,'comment')
            @endif
            @auth
            <form class="add-comment">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Add a commment</label>
                    <div class=" d-flex ">
                        <textarea class="form-control comment-textarea" id="exampleFormControlTextarea1"
                            rows="1"></textarea>
                        <button class="btn btn-primary ms-3">
                            Send
                        </button>
                    </div>
                </div>
            </form>
            @endauth
        </div>

        <div class="my-auto text-end text-danger mr-2">
            <a class="text-danger" href="#">Remove Review</a>
        </div>


    </div>



</div>
