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
                    <h3>Register in <strong>Movie Club</strong></h3>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3 text-light">
                        <label for="name">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') border border-danger @enderror"
                            placeholder="John Doe" id="name">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3  text-light">
                        <label for="email">Email Address *</label>
                        <input type="text" name="email" class="form-control @error('email') border border-danger @enderror"
                            placeholder="johndoe@example.com" id="email">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 d-flex flex-column  text-light">
                        <label for="birthday">Birthday *</label>
                        <input type="date" name="birthday" id="birthday"
                            class="form-control @error('birthday') border border-danger @enderror" name="birthday">
                        @error('birthday')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 text-light">
                        <label for="name">Username *</label>
                        <input type="text" name="username"
                            class="form-control @error('username') border border-danger @enderror" placeholder="johndoe"
                            id="name">
                        @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3  text-light">
                        <label for="password">Password *</label>
                        <input type="password" name="password"
                            class="form-control @error('password') border border-danger @enderror" id="password">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3  text-light">
                        <label for="cpass">Confirm Password *</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') border border-danger @enderror"
                            id="cpassword">
                        @error('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="submit" value="Submit" class="btn btn-block btn-secondary wide mt-5">
                </form>
            </div>
        </div>
    </div>
@endsection
