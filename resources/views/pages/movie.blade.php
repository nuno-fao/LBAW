@extends('layouts.app',['title'=>'Movie Page - '.$movie->title])

@section('content')

    <script src="{{ asset('js/movie.js') }}" defer> </script>
    <script src="{{ asset('js/group_selector.js') }}" defer> </script>


    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Movie</a></li>
        </ol>
    </nav>
    <script>
        var movie_id = {{ $movie->id }}

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
                        <img src="{{ asset($movie->photo) }}" alt="{{ $movie->title }} Photo" class="rounded ml-5"
                            width="150">

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
                    <div class="card mt-4" id="review_form">
                        <div class="card-body ">
                            <div class=" align-items-start text-start ">
                                <div class="mt-0">
                                    <div class="d-flex justify-content-between mx-auto">
                                        @if ($user_review != null)
                                            <script>
                                                let editing_review_id = {{ $user_review->id }}

                                            </script>
                                            <h4 class="my-auto" id="review_section_title">Edit a Review</h4>
                                        @else
                                            <h4 class="my-auto" id="review_section_title">Add a Review</h4>
                                            <script>
                                                let editing_review_id = -1

                                            </script>

                                        @endif
                                        <select name="group" class="col-5 my-auto show form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" id="group-selector">
                                            <option value="-1" selected>Public</option>
                                            @foreach (auth()->user()->groups as $group)
                                                <option value={{ $group->id }}>
                                                    {{ $group->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <div class="row">
                                            <label for="title" class="form-label mt-1 ms-1 ">Title</label>
                                            @if ($user_review != null)
                                                <input type="text" name="title"
                                                    class="col-7 form-control border border-1 rounded-1 ml-3 " id="title"
                                                    aria-describedby="title" value="{{ $user_review->title }}">
                                            @else
                                                <input type="text" name="title"
                                                    class="col-7 form-control border border-1 rounded-1 ml-3 " id="title"
                                                    aria-describedby="title">
                                            @endif
                                        </div>

                                        <label for="description" class="form-label mt-3 ">Description</label>
                                        @if ($user_review != null)
                                            <textarea type="text" rows="3"
                                                class="row-4 form-control border border-1rounded-1 mt-0 comment-area "
                                                name="description" id="description"
                                                aria-describedby="description">{{ $user_review->text }}</textarea>
                                        @else
                                            <textarea type="text" rows="3"
                                                class="row-4 form-control border border-1rounded-1 mt-0 comment-area "
                                                name="description" id="description" aria-describedby="description"></textarea>
                                        @endif
                                        <div class="d-flex justify-content-end ">
                                            <button class="btn btn-outline-secondary mt-3 mb-3"
                                                id="review_button">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endauth
        </section>
        <section class="col-xl-8 col-lg-7 col-12 scrollit mt-2 d-flex flex-column">
            <h4 class="text-center">
                Reviews
            </h4>
            <section id="review_section">
                @each('partials.review', $reviews, 'review')
            </section>
            @if (count($reviews) == 10)
                <button class="btn btn-primary mx-auto" id="nextPage">
                    Next Page
                </button>
            @else
                <p class="text-center">
                    Nothing else to show
                </p>
            @endif
        </section>

    @endsection
