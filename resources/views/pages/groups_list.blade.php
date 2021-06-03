@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Group List</a></li>
        </ol>
    </nav>

    <section class="container">

        <div class="text-center my-5">
            <h4 class="display-5">
                Most Recent Groups
            </h4>
            <div class="align-middle">
                <a href="/groups/add" class="btn btn-primary">Create Group</a>
            </div>
        </div>


    </section>
    <div class="col-xl-8 col-lg-10 col-12  mx-auto my-2">
        <div class="row">
            @foreach ($groups as $group)

                <div class="col-lg-3 col-6 mx-auto mt-1">
                    <div class="card  no-padding">
                        <img src="{{ asset($group->photo) }}" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column d-flex justify-content-center">
                            <a href="/groups/{{ $group->id }}"
                                class="btn btn-primary mx-auto stretched-link">{{ $group->title }}</a>
                            <p class="card-text text-center mt-3">{{ $group->members()->count() }} members</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
