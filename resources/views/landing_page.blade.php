@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
</nav>

<div class="welcome-header px-3 py-auto pt-md-4 pb-md-4 mx-auto text-center mt-2 mt-md-2">
    <h1 class="display-3">
        Welcome
    </h1>
    <div>
        <p class="col-12 col-lg-6 mx-auto">Movie Club is a Social network for the movie aficionados that allows people
            to talk,
            discuss
            and share their
            thoughts about the movies, also recommend and get recommendations for the next film to watch.
        </p>
    </div>
</div>
<div class="container text-center">
    <button type="button" class="btn btn-lg btn-block btn-primary my-3 mx-auto wide w-50">
        Or check out the most popular movies
    </button>

    <div class=" row">
        @foreach($movies as $movie)

        <div class="col card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="{{$movie->photo}}" alt="poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary stretched-link wide">{{$movie->title}}</a>
                </h5>
            </div>
        </div>

        @endforeach
        
    </div>
</div>
 
@endsection
