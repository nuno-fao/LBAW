@extends('layouts.app')

@section('content')

    <script src="{{ asset('js/movie.js') }}" defer> </script>


    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Movie</a></li>
        </ol>
    </nav>
    <script>
        var movie_id = {{ $movie->id }}
        }

    </script>
    <div class="col-lg-12 col-12 mt-2 row  mx-auto">
        <section id="user_info" class="col-xl-4 col-lg-5 col-12 mt-3">
            <div class="card ">
                <div class="card-body ">
                    <div class="d-flex flex-row justify-content-around align-items-start text-start ">
                        <div class="mt-3 gap-5">
                            <h4 class="mt-0">{{ $movie->title }}</h4>
                            <p class="text-secondary mb-1 mt-3">{{ $movie->year }}</p>
                            <p class="text-secondary mb-1">{{ $movie->description }}</p>
                            <p class="text-secondary mb-1 mt-4">
                                @foreach ($movie->genres()->get() as $genre)
                                    {{ $genre->genre }}
                                @endforeach
                            </p>
                        </div>
                        <img src="{{ asset($movie->photo) }}" alt="movie photo" class="rounded ml-5" width="150">

                    </div>
                </div>
            </div>
            @auth
                @can('update', App\Models\Movie::class)
                    <div class="my-auto text-end text-danger mr-2">
                        <a class="text-danger" method="GET" href="{{ route('edit_movie', [$movie->id]) }}">Edit Movie</a>
                    </div>
                @endcan

                <section>
                    @if ($user_review === null)
                        <form class="card mt-4" action="{{ '/api/movie/' . $movie->id . '/review' }}" method="POST"
                            id="review_form">
                        @else
                            <form class="card mt-4" action="{{ '/api/review/' . $user_review->id }}" method="POST"
                                id="review_form">
                                @method('patch')
                    @endif
                    @csrf
                    <div class="card-body ">
                        <div class=" align-items-start text-start ">
                            <div class="mt-0 ">

                                <div class="d-flex justify-content-between mx-auto">
                                    @if ($user_review != null)
                                        <h4 class="my-auto">Edit a Review</h4>
                                        <select name="group" class="col-5 my-auto show form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" id="group-selector">
                                            <option value="{{ $user_review->group_id }}" selected>Public</option>
                                        @else
                                            <h4 class="my-auto">Add a Review</h4>
                                            <select name="group" class="col-5 my-auto show form-select form-select-lg mb-3"
                                                aria-label=".form-select-lg example" id="group-selector">
                                                <option value="" selected>Public</option>
                                                @foreach (auth()->user()->groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                                                @endforeach
                                    @endif

                                    </select>
                                </div>

                                <label for="title" class="form-label mt-1 ">Title</label>
                                <div class="row">
                                    <input type="text" name="title" class="col-7 form-control border border-1 rounded-1 ml-3"
                                        id="title" aria-describedby="title">
                                </div>

                                <label for="description" class="form-label mt-3 ">Description</label>
                                <textarea type="text" rows="3"
                                    class="row-4 form-control border border-1rounded-1 mt-0 comment-area" name="description"
                                    id="description" aria-describedby="description"></textarea>
                                <div class="d-flex justify-content-end ">
                                    <input class="btn btn-outline-secondary mt-3 mb-3 " type="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </section>
            @endauth
        </section>
        <section class="col-xl-8 col-lg-7 col-12 scrollit mt-2">
            <h4 class="text-center">
                Reviews
            </h4>
            <section id="review_section">
                @each('partials.review', $reviews, 'review')

            </section>
            @if (count($reviews) == 10)
                <button class="btn btn-primary ms-3" id="nextPage">
                    Next Page
                </button>
            @else
                <p class="text-center">
                    Nothing else to show
                </p>
            @endif
        </section>

    @endsection
