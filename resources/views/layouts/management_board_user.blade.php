<aside id="user_info" class="bg-light border col-xl-2 col-lg-2 col-8 mx-lg-0 mx-auto d-flex flex-column">
    <h5 class="mx-auto mt-3 display-6">Board</h5>
    <a class="btn btn-primary mt-3" href="{{ route('movie_dashboard_page') }}">
        <h4 class="">Movies</h4>
    </a>
    <a class="btn btn-primary mt-3" href="{{ route('review_dashboard_page') }}">
        <h4 class="">Reported</h4>
    </a>
    <button class="btn btn-primary mt-3" disabled>
        <h4 class="">Users</h4>
    </button>
</aside>
