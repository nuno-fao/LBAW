@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('groups_list') }}">Group List</a></li>
            <li class="breadcrumb-item"><a href="#">Group</a></li>
        </ol>
    </nav>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="col-lg-12 col-12 mt-5 row mx-auto">
        <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed">
            <div class="card ">
                <div class="card-body ">
                    <div class="d-flex flex-row align-items-center text-start ">
                        <div class="mt-3 mr-3">
                            <h4>{{ $group->title }}</h4>
                            <p class="font-size-sm">{{ $group->description }}</p>

                            @can('delete', $group)
                                <form method="post" action="{{ route('delete_group', ['group_id' => $group->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-primary">Delete Group</button>
                                </form>
                            @elsecan('leave', $group)
                                <form method="post"
                                    action="{{ route('leave_group', ['group_id' => $group->id, 'user_id' => auth()->user()->id]) }}">
                                    @csrf
                                    <button class="btn btn-primary">Leave Group</button>
                                </form>
                            @endcan

                        </div>
                        <img src="{{ asset($group->photo) }}" alt="Admin" class="rounded" width="150">

                    </div>
                </div>
            </div>
            <section>
                <div class="text-center">
                    <h4 class="mt-3">Group Members</h4>
                    <a class="nav-link py-0" href="/groups/{{ $group->id }}/members">view all</a>

                </div>
                <section class="d-flex flex-lg-row flex-column" id="down_section">
                    <div class="row col-md-6 col-12 ms-auto me-auto my-4 mx-1">

                        @foreach ($group->members as $member)
                            <a href="{{ route('user', [$member->id]) }}"
                                class="col list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $member->name }}</h5>
                                </div>
                                <p class="mb-1">{{ $member->name }}</p>
                            </a>
                        @endforeach

                    </div>

                </section>
                <div class="text-right">
                    <a href="/groups/{{ $group->id }}/invitation_page" class="btn btn-primary">Invite Friends</a>
                </div>

            </section>
        </aside>
        <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
            <h4 class="text-center">
                Group Exclusive Reviews
            </h4>
            @each('partials.review&movie', $reviews, 'review')
        </section>
    </div>

@endsection
