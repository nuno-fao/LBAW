@if(!auth()->user())

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top" id="navbar">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="{{route('landing_page')}}"><img id="logo-img" src="{{asset('img/logo.png')}}" alt="Movie Club"></a>
        <button class="btn btn-secondary navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-auto ms-5 me-3 row my-auto mt-lg-auto mt-4"
            id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-3 col-12">
                <div class="nav-item">
                    <a class="nav-link" aria-current="page" href="movie_list.php">Movies</a>
                </div>
            </div>
            <form class="d-flex nav-item me-auto col-lg-5 col-12 ps-0">
                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-secondary" type="submit">Search</button> stayings as link while there is no JS --> 
                <a class="btn btn-secondary" href="search_result.php">Search</a>
            </form>
            <div class="navbar-nav col-lg-4 col-12 d-flex justify-content-end my-lg-auto mt-4">
                <a class="btn btn-secondary nav-item me-lg-3 mb-lg-auto mb-2" type="button"
                    href = "{{route('login')}}">Login</a>
                <a class="btn btn-secondary nav-item" type="button"
                    href="{{ route('register')}}">Sign Up</a>
            </div>
        </div>
    </div>
</nav>

@else 

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
                        <a class="dropdown-item" aria-current="page" href="movie_list.php">Movies</a>
                        <a class="dropdown-item" aria-current="page" href="groups_list.php">Groups</a>
                    </div>
                </div>
            </div>
            <form class="d-flex nav-item col-lg-5 col-12 ">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-secondary" type="submit">Search</button> stayings as link while there is no JS --> 
                <a class="btn btn-secondary" href="search_result.php">Search</a>
            </form>

            <div class="navbar-nav col-lg-4 col-12 d-flex justify-content-end my-lg-auto mt-4 text-center">
                <div class="mt-auto mb-auto me-lg-3">
                    <a class="" href="notifications_page.php">
                        <i class="fa fa-bell" id="notification-symbol">
                        </i>
                    </a>
                </div>
                <div class="nav-item ">
                    <a class="nav-link" aria-current="page" href="user_profile.php">johndoe</a>
                </div>
                <button class="btn btn-primary nav-item" type="button"
                    onclick="window.location.href={{route('logout')}}">Logout</button>
            </div>
        </div>
    </div>
</nav>

@endif