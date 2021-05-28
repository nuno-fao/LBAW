<div class="col-lg-12 col-12 row mx-auto">

    @include('layouts.management_board_user)

    <section class="col-xl-7 col-lg-6 col-12 scrollit me-auto ms-auto">
        <h4 class="mt-3 text-center mb-5">
            Banned Users
        </h4>
        <section class="d-flex flex-column mx-auto">
            <div class="col-xl-8 col-lg-10 col-12 mx-auto">

                @each('partials.banned_user', $users, 'users')
            </div>
        </section>
    </section>
</div>