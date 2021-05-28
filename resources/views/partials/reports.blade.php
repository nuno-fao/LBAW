<div class="review card mt-3 bg-light text-dark text-dark">
    <div class="card-header row review-header">
        <h4 class="col col-12 col-lg-9 no-padding">
            {{$review->title}}
        </h4>
        <div class="col col-12 col-lg-3 review-author no-padding">
            <a class="btn text-dark" href="user_profile.php">
                {{$review->user_id}}
            </a>
        </div>
        <div class="col col-12 no-padding">
            <small col>
                {{$review->movie_id}}
            </small>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-end">
            <span class="text-dark my-auto ms-3">
                Reported x times
            </span>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn text-dark">
                View
            </a>
            <a class="btn text-dark">
                Discard
            </a>
            <a class="btn text-dark">
                Delete
            </a>
        </div>
    </div>
</div>