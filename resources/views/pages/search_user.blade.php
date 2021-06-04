@extends('layouts.app',['title'=>'User Search Results'])

@section('content')


    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Search Results</a></li>
        </ol>
    </nav>


    <container class="row justify-content-between container-fluid">
        <aside id="user_info" class="bg-light border col-xl-2 col-lg-2 col-8 mx-lg-3 mx-auto d-flex flex-column">
            <h5 class="mx-auto mt-3 mb-3">Filter By Type</h5>
            <div class="btn-group-vertical">
                <button type="button"
                    class="btn btn-primary rounded-1 mb-3 d-flex align-items-center justify-content-between"
                    onclick="window.location.href='{{ route('search_user', 'query=' . $query) }}'">
                    <span class=" fs-5 ">User</span>
                    <div><span class="fs-6 badge badge-secondary badge-pill">{{ $users_count }}</span></div>
                </button>
                <button type="button"
                    class="btn btn-secondary rounded-1 mb-3 d-flex align-items-center justify-content-between"
                    onclick="window.location.href='{{ route('search_movie', 'query=' . $query) }}'">
                    <span class="fs-5 ">Movie</span>
                    <div><span class="fs-6 badge badge-primary badge-pill">{{ $movies_count }}</span></div>
                </button>
                <button type="button"
                    class="btn btn-secondary rounded-1 mb-3 d-flex align-items-center justify-content-between"
                    onclick="window.location.href='{{ route('search_group', 'query=' . $query) }}'">
                    <span class=" fs-5 ">Group</span>
                    <div><span class="fs-6 badge badge-primary badge-pill">{{ $groups_count }}</span></div>
                </button>
                <button type="button"
                    class="btn btn-secondary rounded-1 mb-3 d-flex align-items-center justify-content-between"
                    onclick="window.location.href='{{ route('search_review', 'query=' . $query) }}'">
                    <span class="fs-5 ">Review</span>
                    <div><span class="fs-6 badge badge-primary badge-pill">{{ $reviews_count }}</span></div>
                </button>
            </div>
        </aside>

        <div class="col-12 col-lg-8">
            <section class="container">
                <div class="text-center my-4">
                    <h3 class="display-7">
                        Search Results For "{{ $query }}"
                    </h3>
                </div>
            </section>
            <div class="d-flex">
                @if ($users_count > 0)
                    <div id="users_section" class=" d-flex justify-content-between flex-wrap mx-auto">
                        @each('partials.user_result',$users,'user')
                    </div>
                @else
                    <h5 class="display-7 mx-auto mt-5">
                        No results to show
                    </h5>
                @endif
            </div>
        </div>

    </container>

@endsection
