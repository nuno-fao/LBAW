@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('user',['user'=>Auth::user()->id])}}">User Profile</a></li>
      <li class="breadcrumb-item"><a href="#">User Friends</a></li>
    </ol>
</nav>

<section class="container">
    <div class="text-center my-5">
        <h4 class="display-5">
            {{$user->name}} Friends
        </h4>
        
    </div>
</section>
<div class="col-xl-8 col-lg-10 col-12  mx-auto my-2">
    <div class="row">
        @foreach($friends as $friend)
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="{{asset($friend->photo)}}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <p class="card-text text-center">{{$friend->name}}</p>

                    <a href="{{url("/user/{$friend->id}")}}" class="btn btn-primary mx-auto stretched-link">{{$friend->username}}</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection