@extends('layouts.app',['title'=>'Confirmation'])

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
                    <h3>Reset password</h3>
                </div>
                <div class="text-center mb-5 text-light">
                    A reset password link was sent to your email.
                    Please follow the indications contained on the email in order to recover your password.
                </div>
                
            </div>
        </div>
    </div>
@endsection
