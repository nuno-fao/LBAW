@extends('layouts.app',['title'=>'Add Movie'])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('movie_dashboard_page') }}">Movie Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Add</a></li>
        </ol>
    </nav>

    <section class="container">
        <div class="text-center my-4">
            <h3 class="display-7">
                @if ($movie != null)
                    Edit a Movie
                @else
                    Add a Movie
                @endif
            </h3>

        </div>
    </section>

    <section class="container">
        <div class="d-flex justify-content-center ">

            <form class="col-10 col-lg-7 border border-10  bg-white rounded-2 pl-3 action" @if ($movie != null) action="{{ route('edit_movie_form', ['id' => $movie->id]) }}" @else action="{{ route('add_movie') }}" @endif method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col">
                        <label for="movieName" class="form-label mt-3 ">Movie Name *</label>
                        <input type="text"
                            class="col-7 form-control border border-1rounded-1 @error('movieName') border-danger @enderror"
                            @if ($movie != null) value="{{ $movie->title }}" @endif name="movieName" id="movieName" aria-describedby="movieName"
                            value="{{ old('movieName') }}">
                        @error('movieName')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="year" class="form-label mt-3 ">Year *</label>
                        <input type="text"
                            class="col-7 form-control border border-1rounded-1 @error('year') border-danger @enderror" @if ($movie != null) value="{{ $movie->year }}" @endif name="year" id="year" aria-describedby="year" value="{{ old('year') }}">
                        @error('year')
                            <div class=" text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>


                <label for="movieDescription" class="form-label mt-3 ">Movie Description</label>
                <textarea type="text" rows="3"
                    class="row-4 form-control border border-1rounded-1 @error('movieDescription') border-danger @enderror"
                    name="movieDescription" id="movieDescription"
                    aria-describedby="movieDescription">@if ($movie != null){{ $movie->description }} @endif {{ old('movieDescription') }} </textarea>
                @error('movieDescription')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label class="form-label mt-3" for="tags">Movie Genres *</label>
                <select id="tags" name="tags[]" class="form-control mt-3 " multiple="multiple">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->genre }}" @if ($movie != null)  @if ($movie->genres()->get()->contains($genre))
                            selected="selected" @endif
                    @endif
                    @if (old('tags') !== null)
                        {{ in_array($genre->genre, old('tags')) ? 'selected' : '' }}
                    @endif
                    >{{ $genre->genre }}</option>
                    @endforeach

                </select>

                <label class="form-label mt-3" for="moviePoster">Upload Movie Poster *</label>
                <input type="file" class="form-control @error('moviePoster') border  border-danger @enderror"
                    id="moviePoster" name="moviePoster" />
                @error('moviePoster')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="row mt-3">
                    <div class="col d-flex  ">
                        <input class="btn btn-outline-secondary mt-3 mb-3 " type="button" value="Cancel">
                    </div>

                    <div class="col d-flex justify-content-end ">
                        <input class="btn btn-outline-secondary mt-3 mb-3 " type="submit" value="Add">
                    </div>
                </div>
            </form>



        </div>
    </section>

@endsection
