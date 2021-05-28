@extends('layouts.app')

@section('content')

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
        
        <form class="col-10 col-lg-7 border border-10  bg-white rounded-2 pl-3 action" action="{{ route('add_movie') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class= "col">
                    <label for="movieName" class="form-label mt-3 ">Movie Name</label>
                    <input type="text" class="col-7 form-control border border-1rounded-1 " @if ($movie != null) value="{{$movie->title}}" @endif name="movieName" id="movieName" aria-describedby="movieName">
                </div>

                <div class= "col">
                    <label for="year" class="form-label mt-3 ">Year</label>
                    <input type="text" class="col-7 form-control border border-1rounded-1 " @if ($movie != null) value="{{$movie->year}}" @endif name ="year" id="year" aria-describedby="year">
                </div>
                
                
            </div>

    
            <label for="movieDescription" class="form-label mt-3 ">Movie Description</label>
            <textarea type="text" rows="3" class="row-4 form-control border border-1rounded-1 " name="movieDescription" id="movieDescription" aria-describedby="movieDescription">@if ($movie != null){{$movie->description}} @endif </textarea>

            <label class="form-label mt-3" for="tags">Movie Genres</label>
            <select id="tags" name="tags" class="form-control mt-3 " multiple="multiple">
                <option value="Adventure" selected="">Adventure</option>
                <option value="Action" selected="">Action</option>
            </select>

            <label class="form-label mt-3" for="moviePoster">Upload Movie Poster</label>
            <input type="file" class="form-control"  id="moviePoster" name="moviePoster"/>

            
              
            <script type="text/javascript">
                $('#tags').select2({
                    tags: true,
                    tokenSeparators: [','],
                    selectOnClose: true, 
                    closeOnSelect: false
                });
            </script>

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