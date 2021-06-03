  

<div class="review card border-secondary mb-3" id="report_{{$review->id}}">
    <div class="card-header row review-header">
        <h4 class="col col-12 col-lg-9 no-padding">
            {{$review->title}}
        </h4>
        <div class="col col-12 col-lg-3 review-author no-padding">
            <a class="btn text-dark" href="#">
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

                <button class="btn text-dark" onclick="removeReport('report_{{$review->id}}',{{$review->id}})">
                    Discard
                </button>  

            {{-- <a class="btn text-dark" onclick="location.href='{{route('discard_report',[$review->id])}}'">
                Discard
            </a> --}}
            <button class="btn text-dark" onclick="deleteReview('report_{{$review->id}}',{{$review->id}})">
                Delete
            </button>
        </div>
    </div>
</div>