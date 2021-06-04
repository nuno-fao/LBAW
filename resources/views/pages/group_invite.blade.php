@extends('layouts.app',['title'=>'Invite To Group'])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('groups_list') }}">Group List</a></li>
            <li class="breadcrumb-item"><a href="{{ route('group', ['group_id' => $group_id]) }}">Group</a></li>
            <li class="breadcrumb-item"><a href="#">Group Invitations</a></li>
        </ol>
    </nav>


    <div class="container d-flex flex-column">
        <div class="display-5 text-center my-2">
            Invite to Group
        </div>

        @foreach ($friends as $friend)
            <div class="row d-flex justify-content-center  my-3">
                <img src="{{ asset($friend->photo) }}" class="card-img-top col-lg-2 my-auto"
                    alt="{{ $friend->name }} Photo">
                <div class="card no-padding mt-3 col-12 col-lg-7 my-auto" id="request_0">
                    <div class="card-body d-flex justify-content-between">
                        <p class="card-text my-auto fs-4"><a
                                href="/user/{{ $friend->id }}">{{ '@' }}{{ $friend->username }}</a>
                        </p>
                        <div class="d-flex">
                            <form class="my-auto" method="post"
                                action="{{ route('group_invite', ['group_id' => $group_id, 'user_id' => $friend->id]) }}">
                                @csrf
                                <button class="btn btn-primary ms-3 request_button my-auto mr-5" @cannot('invite_user',
                                    [App\Models\Group::class, App\Models\Group::find($group_id), $friend]) disabled @endcan
                                    {{-- id="request_0_accept" --}}>
                                    Invite</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

@endsection
