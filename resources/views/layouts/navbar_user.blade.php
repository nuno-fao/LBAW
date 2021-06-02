<nav class=" navbar navbar-expand-lg navbar-dark bg-primary sticky-top" id="navbar">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="{{route('landing_page')}}"><img id="logo-img" src="{{asset('img/logo.png')}}" alt="Movie Club"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-auto ms-5 me-3 row my-auto mt-lg-auto mt-4"
            id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-3 col-12">
                <div class="dropdown text-center">
                    <button class="btn btn-secondary dropdown-toggle mx-auto mt-lg-auto mt-5" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" aria-current="page" href="{{route('movie_list')}}">Movies</a>
                        <a class="dropdown-item" aria-current="page" href="{{route('groups_list')}}">Groups</a>
                    </div>
                </div>
                @can('admin_actions', auth()->user())
                    <a class="btn btn-secondary ml-4 me-lg-4 nav- item me-2 mb-2 mb-lg-auto" href="/admin/movies/board">Admin Mode </a>
                @endcan
                
            </div>
            
            <form class="d-flex nav-item col-lg-5 col-12 ">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-secondary" type="submit">Search</button> stayings as link while there is no JS --> 
                <a class="btn btn-secondary" href="search_result">Search</a>
            </form>

            <div class="navbar-nav col-lg-4 col-12 d-flex justify-content-end my-lg-auto mt-4 text-center">
                
                <div class="mt-auto mb-auto me-lg-3">
                    <a class="" href="{{route('notifications')}}">
                        <i class="fa fa-bell" id="notification-symbol">
                        </i>
                    </a>
                </div>
                <div class="nav-item ">
                    <a class="nav-link" aria-current="page" href="{{route('user', auth()->user()) }}">{{auth()->user()->name}}</a>
                </div>
                <div class="nav-item ">
                    <a class="nav-link" aria-current="page" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>