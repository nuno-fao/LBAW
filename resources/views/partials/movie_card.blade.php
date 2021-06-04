<div class="col card col-lg-3 col-md-6 col-12 card mb-3">
    <img class="card-img-top img-responsive" src="{{ asset($movie->photo) }}" alt="movie poster"
        style="height:380px;">
    <div class="card-body">
        <h5 class="card-title text-nowrap">
            <a href="{{ url("/movie/{$movie->id}") }}"
                class="btn btn-primary stretched-link wide">{{ $movie->title }}</a>
        </h5>
    </div>
</div>
