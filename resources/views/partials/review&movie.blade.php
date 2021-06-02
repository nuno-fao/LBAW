<div class="row align-items-center my-4" id="review_{{$review->id}}">
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
        @include('templates.review')
    </div>
</div>