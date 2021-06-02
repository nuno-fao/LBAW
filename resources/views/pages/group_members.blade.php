@extends('layouts.app')

@section('content')

<section class="container">
    <div class="text-center my-5">
        <h3 class="display-5">
            Justice League Members
        </h3>
    </div>
</section>
<div class="col-xl-8 col-lg-10 col-12  mx-auto my-2">
    <div class="row">
        @foreach ($members as $member)
            
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="{{asset($member->photo)}}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <p class="card-text text-center">{{$member->name}}</p>

                    <a href="{{url("/user/{$member->id}")}}" class="btn btn-primary mx-auto stretched-link">{{$member->username}}</a>
                </div>
            </div>
        </div>

        @endforeach
        
    </div>

   
</div>

@endsection