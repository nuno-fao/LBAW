@extends('layouts.app')

@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Notifications</a></li>
    </ol>
</nav>


<div class="container d-flex flex-column">
    <div class="display-5 text-center my-2">
        Pending Notifications
    </div>
    @each('partials.notification',$notifications,'notification')
</div>

@endsection
