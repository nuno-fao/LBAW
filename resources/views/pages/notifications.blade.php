@extends('layouts.app')

@section('content')

    <script src="{{ asset('js/notification_pagination.js') }}" defer> </script>


    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Notifications</a></li>
        </ol>
    </nav>


    <div class="container d-flex flex-column">
        <div class="display-5 text-center my-2">
            Pending Notifications
        </div>
        <div id="notification_section">
            @each('partials.notification',$notifications,'notification')
        </div>

    </div>

    <div class="d-flex justify-content-center mt-3">
        @if (count($notifications) == 10)
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
