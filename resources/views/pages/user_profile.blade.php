@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 mt-5 row mx-auto">
    <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed sticky_left_aside">
        <div class="card mx-auto">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset($user->photo)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h4>{{$user->name}}</h4>
                        <p class="text-secondary mb-1">{{$user->username}}</p>
                        <p class="text-muted font-size-sm">{{\Carbon\Carbon::parse($user->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y Years Old')}}</p>
                        <p class="font-size-sm">{{$user->email}}</p>
                        @if($user != auth()->user())
                        <button class="btn btn-primary">Send Request</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <section id="collapsable_section">
            <div class="text-center">
                <h4 class="mt-3 text-center">Friends</h4>
                <a class="nav-link py-0" href="friends_page.php">view all</a>
                
            </div>
            <section class="d-flex flex-lg-row flex-column" id="down_section">
                <div class="row col-md-6 col-12 ms-auto me-auto my-4 mx-1">
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Mickey Mouse</h5>
                        </div>
                        <p class="mb-1">@the_real_mickey</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">The Beast</h5>
                        </div>
                        <p class="mb-1">@im_the_beast</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Beauty</h5>
                        </div>
                        <p class="mb-1">@im_a_beauty</p>
                    </a>
                </div>
                <div class="row col-md-6 col-12 ms-auto me-auto my-4 mx-1">
                    <a href=" user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sonic</h5>
                        </div>
                        <p class="mb-1">@fasterthanflash</p>
                    </a>
                    <a href=" user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Androis</h5>
                        </div>
                        <p class="mb-1">@imagreendroid</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sleepy Beaty</h5>
                        </div>
                        <p class="mb-1">@sleep4ever</p>
                    </a>
                </div>
            </section>
            
        </section>
    </aside>
    <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
        <h4 class="text-center">
            Latest Reviews
        </h4>
        <?php
        //Meter reviews aqui
        ?>
    </section>
</div>

@endsection