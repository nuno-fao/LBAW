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
        @can('see', $group)
            <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed">
            @else
                <aside id="user_info" class="col-xl-4 col-lg-5 col-12 mx-auto">
                @endcan
                <div class="card ">
                    <div class="card-body ">
                        <div class="d-flex flex-row align-items-center text-start ">
                            <div class="mt-3 mr-3">
                                <h4>{{ $group->title }}</h4>
                                <p class="font-size-sm">{{ $group->description }}</p>

                                <div class="d-flex justify-content-around">
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
                                    @can('invite', $group)
                                        <div class="text-right d-flex">
                                            <a href="/groups/{{ $group->id }}/invitation_page"
                                                class="btn btn-primary mx-auto">Invite
                                                Friends</a>
                                        </div>
                                    @endcan
                                </div>

                            </div>
                            <img src="{{ asset($group->photo) }}" alt="Admin" class="rounded" width="150">

                        </div>

                    </div>
                </div>
                <section>

                    <div id="collapsable_section">
                        <div class="text-center">
                            <h4 class="mt-3 text-center">Group Members</h4>
                            <a class="nav-link py-0" href="{{ route('members_page', [$group->id]) }}">view all</a>
                        </div>
                        <div class="d-flex flex-column me-3 mt-3" id="down_section">
                            @foreach ($group->members->chunk(2) as $chunk)
                                <div class="row">
                                    @foreach ($chunk as $add)
                                        <div class="mx-auto col-6">
                                            <a href="{{ route('user', [$add->id]) }}"
                                                class="col list-group-item list-group-item-action" aria-current="true">
                                                <h5 class="mb-1">{{ $add->name }}</h5>
                                                <p class="mb-1">{{ '@' }}{{ $add->username }}</p>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                </section>
            </aside>
            @can('see', $group)
                <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
                    <h4 class="text-center">
                        Group Exclusive Reviews
                    </h4>
                    @each('partials.review&movie', $reviews, 'review')
                </section>
            @endcan
    </div>

@endsection
