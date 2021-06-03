@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb" id="breadcrumb">
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
    <a type="button" class="btn btn-lg btn-block btn-primary my-3 mx-auto wide w-50" href="{{route('feed')}}">
        Or check out our user's most recent activity
    </a>

    <div class=" row">

        @each('partials.movie_card',$movies,'movie')
        
    </div>
</div>
 
@endsection
