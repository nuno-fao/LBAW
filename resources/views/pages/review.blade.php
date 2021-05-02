@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Movie</a></li>
      <li class="breadcrumb-item"><a href="#">Review</a></li>
    </ol>
</nav>

<div class="col-11 col-lg-10 my-auto mx-auto">
    <div class="row align-items-center my-4 review-section">
        <div class="col col-12 col-lg-1">
        </div>
    
        <div href="movie_page.php" class="my-auto me-2 col-12 col-lg-2">
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
            <a href="movie_page.php"><img class="card-img-top img-responsive review-poster" src="{{asset($review->movie->photo)}}" alt="fight club poster"></a>
        </div>
        <div class="review card mt-3 col-12 col-lg-8 px-0">
            <div class="card-header row review-header" onclick="location.href='review_page.php'">
                <div class="col col-12 col-lg-9 no-padding">
                   {{$review->title}}</div>
                <div class="col col-12 col-lg-3 review-author no-padding">
                    <a class="btn text-dark" href="user_profile.php">
                        by John Doe
                    </a>
                </div>
                <div class="col col-12 no-padding">
                    <small col>
                        {{$review->date}}
                    </small>
                </div>
            </div>
            <div class="review-body card-body d-flex flex-column" onclick="location.href='review_page.php'">
                {{$review->text}}
            </div>
            <div class="card-footer d-flex d-flex justify-content-between review-footer">
                <div class="like_button no-padding">
                    <i onclick="myFunction(this)" class="fa fa-thumbs-up"> {{$review->likes}}</i>
                </div>
                <a class="btn" data-toggle="collapse" href="#comments0" role="button" aria-expanded="false"
                    aria-controls="comments0">
                    0 Comments
                </a>
            </div>
            <div class="comment-section mt-3 collapse" id="comments0">
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
            </div>
        </div>
    </div>
    
</div>


@endsection