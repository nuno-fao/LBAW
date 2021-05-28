<aside id="user_info" class="bg-light border col-xl-2 col-lg-2 col-8 mx-lg-0 mx-auto d-flex flex-column">
    <h5 class="mx-auto mt-3 display-6">Board</h5>
    <button class="btn btn-primary mt-3" disabled>
        <h4 class="">Movies</h4>
    </button>
    <a class="btn btn-primary mt-3" href="{{route('review_dashboard_page')}}">
        <h4 class="">Reported</h4>
    </a>
    <a class="btn btn-primary mt-3" href="users_board.php">
        <h4 class="">Users</h4>
    </a>
    <button class="btn btn-primary mt-5" disabled>
        <h4 class="">Get Movies Updates</h4>
    </button>
    <div class="d-flex flex-column">
        <button class="btn btn-primary mt-3" disabled>
            <h4 class="">Update Movies</h4>
        </button>
        <strong class="ms-auto me-3">0 Updates</strong>
    </div>
    <a class="btn btn-primary mt-3" href="{{route('add_movie')}}" >
        <h4 class="">Add a Movie</h4>
    </a>
    <div class="mt-3 d-flex flex-column container">
        <strong class="">Total Movies</strong>
        <span>
            <p class="mx-auto">
                {{$movies->count()}}
            </p>
        </span>
    </div>
</aside>