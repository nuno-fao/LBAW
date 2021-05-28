@extends('layouts.app')

@section('content')


<div class="col-lg-12 col-12 row mx-auto">
    
    @include('layouts.management_board_movie')

    <section class="col-xl-7 col-lg-6 col-12 scrollit me-auto ms-auto">
        <h4 class="mt-3 text-center mb-5">
            Movies
        </h4>
        <section class="d-flex flex-column mx-auto">
            <div class="col-12  mx-auto my-2">
                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-lg-3 col-6 mx-auto mt-1">
                            <a class="card  no-padding" href="{{url("/movie/{$movie->id}")}}">
                                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                                    <p class="card-text text-center mb-0 text-truncate">{{$movie->title}}</p>
                                    <p class="card-text text-center mt-0">{{$movie->year}}</p>
                                </div>
                                <img src="{{asset($movie->photo)}}" class="card-img-top" alt="...">
                                
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
    </section>
</div>

@endsection