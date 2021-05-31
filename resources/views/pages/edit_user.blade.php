@extends('layouts.app')

@section('content')

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
                Edit your profile
        </h3>
        
    </div>
</section>

<section class="container">
    <div class="d-flex justify-content-center ">
        
        <form class="col-10 col-lg-7 border border-10  bg-white rounded-2 pl-3 action" action="{{ route('edit_user', ['user_id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class= "col">
                    <label for="name" class="form-label mt-3 ">Name</label>
                    <input type="text" class="col-7 form-control border border-1rounded-1 " value="{{$user->name}}" name="name" id="name" aria-describedby="name">
                </div>

                <div class= "col">
                    <label for="username" class="form-label mt-3 ">Username</label>
                    <input type="text" class="col-7 form-control border border-1rounded-1 " value="{{$user->username}}" name="username" id="username" aria-describedby="username">
            
                </div>
                
    
            </div>

            <label for="year" class="form-label mt-3 ">Email Address</label>
            <input type="text" class="col-7 form-control border border-1rounded-1 " value="{{$user->email}}" name ="email" id="email" aria-describedby="email">


    
            <label for="movieDescription" class="form-label mt-3 ">Birthday</label>
            <input type="date" value="{{$user->date_of_birth}}" name="birthday" id="birthday" class="form-control @error('birthday') border border-danger @enderror" name="birthday">

          
            
            <label class="form-label mt-3" for="moviePoster">Upload New User Picture</label>
            <input type="file" class="form-control"  id="userPhoto" name="userPhoto"/>

            
              
            <script type="text/javascript">
                $('#tags').select2({
                    tags: true,
                    tokenSeparators: [','],
                    
                    
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