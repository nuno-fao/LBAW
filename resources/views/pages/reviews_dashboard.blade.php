@extends('layouts.app',['title'=>'Reviews Dashboard'])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Reviews Dashboard</a></li>
        </ol>
    </nav>


    <div class="col-lg-12 col-12 row mx-auto" id="reviews">
        @include('layouts.management_board_reviews', ['reviews' => $reviews])
        <section class="col-xl-7 col-lg-6 col-12 scrollit me-auto ms-auto">
            <h4 class="mt-3 text-center mb-5">
                Reported Reviews
            </h4>
            <section class="d-flex flex-column mx-auto">
                @each('partials.reports', $reviews, 'review')

            </section>
        </section>
    </div>

@endsection
