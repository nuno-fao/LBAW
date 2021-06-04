@extends('layouts.app',['title'=>'User Profile - '.$user->username])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User Profile</a></li>
        </ol>
    </nav>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/ban-unban.js') }}" defer> </script>
    <script src="{{ asset('js/user_pagination.js') }}" defer> </script>
    <script>
        var user_id = {{ $user->id }}

    </script>
    <div class="col-lg-12 col-12 mt-5 row mx-auto">
        <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed sticky_left_aside">
            <div class="card mx-3">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        {{-- <form action="{{route('edit_user',['user_id' => $user->id ])}}"> --}}
                        @can('edit', $user)

                            <button class="position-absolute btn top-0 start-0" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                </svg>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form action="{{ route('edit_user', ['user_id' => $user->id]) }}">
                                    <button class="dropdown-item">Edit Profile</button>
                                </form>
                                <form action="{{ route('edit_password', ['user_id' => $user->id]) }}">
                                    <button class="dropdown-item">Change Password</button>
                                </form>
                                {{-- ESTE PROXIMO FORM DEVIA SER DELETE, MAS POR ALGUMA RAZAO OS DELETES NAO FUNCIONAM --}}
                                <form action="{{ route('delete_user', ['user_id' => $user->id]) }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">Delete Account</button>
                                </form>

                            </div>
                        @endcan
                        {{-- </form> --}}

                        <div class="position-relative">
                            <img src="{{ asset($user->photo) }}" alt="{{ $user->name }} Photo"
                                class="rounded-circle d-block" width="150px">
                            <!-- <svg href="#" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="position-absolute top-0 end-0 bi bi-pencil" viewBox="0 0 16 16">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </svg> -->
                        </div>
                        <div class="mt-3">
                            <h4>{{ $user->name }}</h4>
                            <p class="text-secondary mb-1">{{ $user->username }}</p>
                            <p class="text-muted font-size-sm">
                                {{ \Carbon\Carbon::parse($user->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y Years Old') }}
                            </p>
                            <p class="font-size-sm">{{ $user->email }}</p>
                            @cannot('edit', $user)
                                <div class="d-flex justify-content-around">
                                    @can('cancel', [App\Models\Friend::class, $user])
                                        <div class="">
                                            <form method="POST"
                                                action="{{ route('cancel_friend_request', [auth()->user()->id, $user->id]) }}"
                                                class="col">
                                                @csrf
                                                <button class="btn btn-primary">Cancel Request</button>
                                            </form>
                                        </div>

                                    @elsecan('accept', [App\Models\Friend::class,$user])

                                        <div class="row">
                                            <form method="POST"
                                                action="{{ route('reject_friend_request', [auth()->user()->id, $user->id]) }}"
                                                class="col">
                                                @csrf
                                                <button class="btn btn-primary">Reject</button>
                                            </form>

                                            <form method="POST"
                                                action="{{ route('accept_friend_request', [auth()->user()->id, $user->id]) }}"
                                                class="col">
                                                @csrf
                                                <button class="btn btn-primary">Accept</button>
                                            </form>
                                        </div>
                                    @elsecan('invite', [App\Models\Friend::class,$user])
                                        <form method="POST"
                                            action="{{ route('friend_request', [$user->id, auth()->user()->id]) }}">
                                            @csrf
                                            <button class="btn btn-primary">Send Request</button>
                                        </form>
                                    @else
                                        <span class="badge badge-secondary d-flex flex-column">
                                            <span class="my-auto h6">Friend</span>
                                        </span>
                                    @endcan

                                    @can('ban', $user)
                                        <button class="btn btn-primary" id="ban-button" onclick="ban({{ $user->id }})">
                                            @if (!$user->banned)
                                                {{ 'Ban' }}
                                            @else
                                                {{ 'Unban' }}
                                            @endif
                                        </button>
                                    @endcan
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div id="collapsable_section">
                <div class="text-center">
                    <h4 class="mt-3 text-center">Friends</h4>
                    <a class="nav-link py-0" href="{{ route('friends', [$user->id]) }}">view all</a>
                </div>
                <div class="d-flex flex-column me-3 mt-3" id="down_section">
                    @foreach ($user->friends->take(6)->chunk(2) as $chunk)
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
        </aside>
        <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
            <h4 class="text-center">
                Latest Reviews
            </h4>
            <div id="user_review_section">
                @each('partials.review&movie', $reviews, 'review')
            </div>
            <div class="d-flex justify-content-center">
                @if (count($reviews) == 10)
                    <button class="btn btn-primary  " id="nextPage">
                        Next Page
                    </button>
                @else
                    <p class="text-center">
                        Nothing else to show
                    </p>
                @endif
            </div>
        </section>


    </div>

@endsection
