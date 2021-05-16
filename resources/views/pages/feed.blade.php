@extends('layouts.app')

@section('content')

<script src="{{ asset("js/feed_pagination.js")}}" defer> </script>
<script src="{{ asset('js/feed_selector.js') }}" defer></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Feed</a></li>
    </ol>
</nav>


<div id="feed-selector" class="d-flex me-auto justify-content-center mt-0 sticky-top background_color">
    <div class="mx-1" id="btn-public">
        <button class="btn btn-secondary rounded-0">
            Public Feed
        </button>
        <div class="pt-1 bg-primary"></div>
    </div>
    @auth
    <div class="mx-1" id="btn-friends">
        <button class="btn btn-secondary rounded-0">
            Friends Feed
        </button>
        <div class="pt-1 bg-secondary"></div>
    </div>
    @endauth
</div>
<div class="feed mt-5" id="public_feed">
    
    @each('partials.review&movie',$reviews,'review')
    
</div>
@auth
<div class="feed mt-5" id="friends_feed">
    
    {{-- DRAW FRIENDS REVIEWS --}}
</div>
@endauth

<div class="d-flex justify-content-center">
@if (count($reviews) == 10)
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