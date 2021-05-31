@extends('layouts.app')

@section('content')

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
                Change password
        </h3>
        
    </div>
</section>

<section class="container">
    <div class="d-flex justify-content-center ">
        
        <form class="col-10 col-lg-7 border border-10 justify-content-center bg-white rounded-2 pl-3 action" action="{{ route('edit_password', ['user_id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
        
    
            <label for="current_password" class="form-label align-center mt-3 ">Current password</label>
            <input type="password" class="col-7 form-control border border-1rounded-1 " name="current_password" id="current_password" aria-describedby="current_password">

            <label for="new_password" class="form-label mt-3 ">New password</label>
            <input type="password" class="col-7 form-control border border-1rounded-1 " name="new_password" id="new_password" aria-describedby="new_password">
            
            <label for="new_password_confirmation" class="form-label mt-3 ">New password Confirmation</label>
            <input type="password" class="col-7 form-control border border-1rounded-1 " name="new_password_confirmation" id="new_password_confirmation" aria-describedby="new_password_confirmation">

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