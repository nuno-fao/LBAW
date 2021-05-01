@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
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
                <h3>Register in <strong>Movie Club</strong></h3>
            </div>
            <form action="{{ route('login') }}" method="POST">
                <div class="form-group mb-3 text-light">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="John Doe" id="name">
                </div>
                <div class="form-group mb-3  text-light">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" class="form-control" placeholder="johndoe@example.com" id="email">
                </div>
                <div class="form-group mb-3 d-flex flex-column  text-light">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" name="birthday">
                </div>
                <div class="form-group mb-3 text-light">
                    <label for="name">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="johndoe" id="name">
                </div>
                <div class="form-group mb-3  text-light">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group mb-3  text-light">
                    <label for="cpass">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword">
                </div>
                <input type="submit" value="Submit" class="btn btn-block btn-secondary wide mt-5">
            </form>
        </div>
    </div>
</div>
@endsection
