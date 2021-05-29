<script>
    if(typeof review_id !== 'undefined'){
        review_id = {{$review->id}}
    }
    else{
        review_id = {{$review->id}}
    }
    
</script>
  

<div class="review card mt-3 bg-light text-dark text-dark">
    <div class="card-header row review-header">
        <h4 class="col col-12 col-lg-9 no-padding">
            {{$review->title}}
        </h4>
        <div class="col col-12 col-lg-3 review-author no-padding">
            <a class="btn text-dark" href="user_profile.php">
                {{$review->user->username}}
            </a>
        </div>
        <div class="col col-12 no-padding">
            <small col>
                {{$review->movie->title}}
            </small>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-end">
            <span class="text-dark my-auto ms-3">
                Reported {{$review->reports()->count()}} times
            </span>
        </div>
        <div class="d-flex justify-content-end">
            
            <a class="btn text-dark" onclick="location.href='{{route('review',[$review->id])}}'">
                View
            </a>

            <form method="POST" action="{{route('discard_report',['review_id' => $review->id])}}">
                @csrf
                <button class="btn text-dark" >
                    Discard
                </button>  
            </form>

            {{-- <a class="btn text-dark" onclick="location.href='{{route('discard_report',[$review->id])}}'">
                Discard
            </a> --}}
            <button class="btn text-dark" id="deleteButton{{$review->id}}">
                Delete
            </button>
        </div>
    </div>
</div>