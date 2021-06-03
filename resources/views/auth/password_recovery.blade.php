@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <div class="mt-lg-5 mt-3 container d-flex flex-column">
        <div class="text-center mb-4">
            <b>Personal Details</b> > Account Setup
        </div>
        <div>
            <div class="bg-primary col-lg-6 col-md-8 col-12 mx-auto py-5 px-5 login_form">
                <div class="text-center mb-5 text-light pb-2">
                    <h3>Password Recovery</h3>
                </div>
                <form action="{{ route('forgot_password') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3  text-light">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" class="form-control"
                            {{-- @error('email') border border-danger @enderror" --}}
                            id="email" 
                            placeholder="johndoe@example.com" >
                            
                        {{-- @error('email') --}}
                            {{-- <div class="text-danger">
                                {{ $message }}
                            </div> --}}
                        {{-- @enderror --}}
                    </div>
                    
                    <input type="submit" value="Submit" class="btn btn-block btn-secondary wide mt-5">
                </form>
            </div>
        </div>
    </div>
@endsection
