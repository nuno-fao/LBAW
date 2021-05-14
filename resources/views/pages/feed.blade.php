@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Feed</a></li>
    </ol>
</nav>


<div id="feed-selector" class="d-flex me-auto justify-content-center mt-0 sticky-top bg-light">
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
    <h4 class="display-6 text-center">
        Public Feed
        @each('partials.review&movie',$reviews,'review')
    </h4>
    
</div>
@auth
<div class="feed mt-5" id="friends_feed">
    <h4 class="display-6 text-center">Friends Feed</h4>
    {{-- DRAW FRIENDS REVIEWS --}}
</div>
@endauth

@endsection