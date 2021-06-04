@extends('layouts.app',['title'=>'About Us'])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">About Us</a></li>
        </ol>
    </nav>

<div class="container">
    <h1 class="display-4 mt-3">
        About Us
    </h1>
    <div class="row mt-3">
        <h6 class="lead col-12 col-lg-8">
            This project aims to develop a social network for movie aficionados, allowing
            them to share and discuss their passion for movies with others.
            <br>
            <br>
            We believe that a movie specific social network allows people to connect and talk about their passion
            without the usual disturbance of general purpose social networks so in this context our website will be
            closer towards the IMDb type of product. With this in mind our users will be able to review movies and alike
            but we also offer the possibility to make the reviews private and to create named groups and our main page
            will focus around seeing all the latest reviews.
        </h6>
        <div class="lead col-12 col-lg-4">
            <img class="card-img-top img-responsive" src="img/main_page_print.png" alt="main_page">
        </div>
    </div>
    <div class=" row my-5">
        <div class="col card col-lg-3 col-md-6 col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="img/rocas777.jpeg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <button href="#" class="btn btn-primary wide">Miguel Pinto</button>
                </h5>
                <button href="#" class="btn btn-primary wide">up201806206@fe.up.pt</button>
            </div>
        </div>
        <div class="col card col-lg-3 col-md-6 col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="img/nunation.png" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <button href="#" class="btn btn-primary wide">Nuno Oliveira</buttona>
                </h5>
                <button href="#" class="btn btn-primary wide">up201806525@fe.up.pt</button>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6  col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="img/luis.png" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <button class="btn btn-primary wide">Luí­s Miranda</button>
                </h5>
                <button class="btn btn-primary wide">up201704093@fe.up.pt</button>
            </div>
        </div>
    </div>
</div>

@endsection