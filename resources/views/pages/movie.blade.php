@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Movie</a></li>
  </ol>
</nav>

<div class="col-lg-12 col-12 mt-2 row  mx-auto">
    <section id="user_info" class="col-xl-4 col-lg-5 col-12 mt-3">
        <div class="card ">
            <div class="card-body ">
                <div class="d-flex flex-row justify-content-around align-items-start text-start ">
                    <div class="mt-3 gap-5">
                        <h4 class="mt-0">{{ $movie->title }}</h4>
                        <p class="text-secondary mb-1 mt-3">{{ $movie->year }}</p>
                        <p class="text-secondary mb-1">8.7/10 stars</p>
                        <p class="text-secondary mb-1 mt-5">
                          @foreach ($movie->genres as $genre)
                            {{$genre->genre}} 
                          @endforeach
                        </p>

                    </div>
                    <img src="{{asset($movie->photo)}}" alt="movie photo" class="rounded ml-5" width="150">

                </div>
            </div>
        </div>
        @auth
        <section>
          <form class="card mt-4" action="{{ route('review',$movie->id )}}" method="POST">
            @csrf
              <div class="card-body ">
                  <div class=" align-items-start text-start ">
                      <div class="mt-0 ">

                          <div class="d-flex justify-content-between mx-auto">
                              <h4 class="my-auto">Add a Review</h4>
                              <select name="group" class="col-5 my-auto show form-select form-select-lg mb-3"
                                  aria-label=".form-select-lg example">
                                  <option value="" selected>Public</option>
                                  <option value="2">Fight Frenzy</option>
                                  <option value="3">Yolo</option>
                              </select>
                          </div>

                          <label for="title" class="form-label mt-1 ">Title</label>
                          <div class="row">
                              <input type="text" name ="title" class="col-7 form-control border border-1 rounded-1 ml-3" id="title"
                                  aria-describedby="title">
                          </div>

                          <label for="description" class="form-label mt-3 ">Description</label>
                          <textarea type="text" rows="3"
                              class="row-4 form-control border border-1rounded-1 mt-0 comment-area" name ="description" id="description"
                              aria-describedby="description"></textarea>

                          <div class="d-flex justify-content-end ">
                              <input class="btn btn-outline-secondary mt-3 mb-3 " type="submit" value="Submit">
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </section>
        @endauth
    </section>
    <section class="col-xl-8 col-lg-7 col-12 scrollit mt-2">
        <h4 class="text-center">
            Reviews
        </h4>
            @each('partials.review', $movie->reviews, 'review')
    </section>

@endsection
