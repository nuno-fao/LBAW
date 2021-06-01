@extends('layouts.app')

@section('content')

<div class="container d-flex flex-column">
    <div class="display-5 text-center my-2">
        Invite to Group
    </div>

    @foreach ($friends as $friend)
        
    @endforeach

    <div class="row d-flex justify-content-center">
        <img src="images/avatar1.jpg" class="card-img-top col-lg-2" alt="...">
        <div class="card no-padding mt-3 col-12 col-lg-7 " id="request_0">
            <div class="card-body d-flex justify-content-between">
                <p class="card-text my-auto fs-4"><a href="user_profile.php">{{$friend->username}}</a> </p>
                <p class="card-text my-auto fs-4"> {{$friend->name}}</p>
                
                <div class="d-flex ">
                    <a href="#" class="btn btn-primary ms-3 request_button my-auto mr-5 " id="request_0_accept">Invite</a>
                </div>
            </div>
        </div>
    </div>

    
</div>

@endsection