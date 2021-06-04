@extends('layouts.app',['title'=>'User Dashboard'])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users Dashboard</a></li>
        </ol>
    </nav>

    <script src="{{ asset('js/ban-unban.js') }}" defer> </script>


    <div class="col-lg-12 col-12 row mx-auto">

        @include('layouts.management_board_user')

        

        <section class="col-xl-7 col-lg-6 col-12 scrollit me-auto ms-auto">
            <h4 class="mt-3 text-center mb-5">
                Banned Users
            </h4>
            <section class="d-flex flex-column mx-auto">
                <div class="col-xl-8 col-lg-10 col-12 mx-auto">
                    @each('partials.banned_user', $users, 'user')
                </div>
            </section>
        </section>
    </div>

@endsection
