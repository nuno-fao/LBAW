@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Feed</a></li>
    </ol>
</nav>


<div id="feed-selector" class="d-flex me-auto justify-content-center mt-0 sticky-top">
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

@endsection