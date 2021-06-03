@extends('layouts.app')

@section('content')


    <script>
        let review_page = true;

    </script>


    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Review</a></li>
        </ol>
    </nav>


    <div class="col-11 col-lg-10 my-auto mx-auto " id="review_{{ $review->id }}">
        <div class="row align-items-center my-4 review-section">
            <div class="col col-12 col-lg-1">
            </div>

            <div href="{{ route('movie', [$review->movie]) }}" class="my-auto me-2 col-12 col-lg-2">
                <div class=" d-flex flex-column flex-xl-row">
                    <div>
                        <p class="text-center badge bg-primary">
                            {{ $review->movie->title }}
                        </p>
                    </div>
                    <div>
                        <p class="text-center badge bg-primary">
                            {{ $review->movie->year }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('movie', [$review->movie]) }}"><img class="card-img-top img-responsive review-poster"
                        src="{{ asset($review->movie->photo) }}" alt="movie poster"></a>
            </div>
            <div class="review card mt-3 col-12 col-lg-8 px-0">
                @include('templates.review')
            </div>
        </div>

    </div>


@endsection
