@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Search Results</a></li>
        </ol>
    </nav>

    <section class="container">
        <div class="text-center my-4">
            <h3 class="display-7">
                Search Results For "Fight Club"
            </h3>
        </div>
    </section>

    <container class="row justify-content-center container-fluid">
        <aside id="user_info" class="bg-light border col-xl-2 col-lg-2 col-8 mx-lg-3 mx-auto d-flex flex-column">
            <h5 class="mx-auto mt-3 mb-3">Filter By Type</h5>
            <div class="btn-group-vertical">
                <button type="button"
                    class="btn btn-primary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                    <span class=" fs-5 ">User</span>
                    <div><span class="fs-6 badge badge-secondary badge-pill">3</span></div>
                </button>
                <button type="button"
                    class="btn btn-secondary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                    <span class="fs-5 ">Movie</span>
                    <div><span class="fs-6 badge badge-primary badge-pill">1</span></div>
                </button>
                <button type="button"
                    class="btn btn-secondary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                    <span class=" fs-5 ">Group</span>
                    <div><span class="fs-6 badge badge-primary badge-pill">1</span></div>
                </button>
                <button type="button"
                    class="btn btn-secondary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                    <span class="fs-5 ">Review</span>
                    <div><span class="fs-6 badge badge-primary badge-pill">3</span></div>
                </button>
            </div>
        </aside>

        <div class="col-8">
            <div id="users_section" class=" d-flex justify-content-between flex-wrap">
                @each('partials.user_result',$users,'user')
            </div>
        </div>

    </container>

@endsection
