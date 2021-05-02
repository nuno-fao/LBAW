@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Review</a></li>
    </ol>
</nav>

<div class="col-11 col-lg-10 my-auto mx-auto">
    <div class="row align-items-center my-4 review-section">
        <div class="col col-12 col-lg-1">
        </div>
    
        <div href="{{route('movie',[$review->movie])}}" class="my-auto me-2 col-12 col-lg-2">
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
            <div class="card-header row review-header">
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
            <div class="review-body card-body d-flex flex-column">
                {{$review->text}}
            </div>
            <div class="card-footer d-flex d-flex justify-content-between review-footer">
                <div class="like_button no-padding">
                    <i onclick="myFunction(this)" class="fa fa-thumbs-up"> {{$review->likes}}</i>
                </div>
                <a class="btn" data-toggle="collapse" href="#comments" role="button" aria-expanded="false"
                    aria-controls="comments">
                    {{$review->comments->count()}} comments
                </a>
            </div>
            
            <div class="comment-section mt-3 collapse" id="comments">
                @if ($review->comments->count() > 0)
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
            
        </div>
    </div>
    
</div>


@endsection