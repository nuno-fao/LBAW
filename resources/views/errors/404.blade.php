@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb" id="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
</nav>

<div class="welcome-header px-3 py-auto pt-md-4 pb-md-4 mx-auto text-center mt-2 mt-md-2">
    <h1 class="display-3">
        Ups... Page Not Found
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
    <button type="button" class="btn btn-lg btn-block btn-primary my-3 mx-auto wide w-50" onclick="window.location.href ='{{'/'}}' ">
        Check out the most popular movies
    </button>
</div>
 
@endsection
