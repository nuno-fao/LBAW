@extends('layouts.app')

@section('content')

<script src="{{ asset("js/movie_list_pagination.js")}}" defer> </script>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Movie List</a></li>
    </ol>
</nav>


<div class="container d-flex flex-column" >

    <div class="display-5 text-center my-2">
        Movie List
    </div>

    <div id="movies_section" class=" row">
        @each('partials.movie_card',$movies,'movie')
    </div>
    
</div>

<div class="d-flex justify-content-center mt-3">
    @if (count($movies) == 20)
        <button class="btn btn-primary  " id="nextPage">
            Next Page
        </button>
    @else
        <p class="text-center">
            Nothing else to show
        </p>
    @endif
</div>

@endsection
