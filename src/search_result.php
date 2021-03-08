<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user(); ?>

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
            Search Results For Fight Club
        </h3>
        
    </div>
</section>

<section class="container">
    <div class="row align-items-start">
        <div class="col-3 border border-3 border-dark rounded-2 mr-5 px-4 d-grid">
            <button class="row border border-1 mt-3 btn-outline-dark rounded-1">
                <div class="col fs-5">All</div>
                <div class="col fs-5">347</div>
            </button>

            <button class="row border border-1 mt-3 btn-outline-dark rounded-1">
                <div class="col fs-5">User</div>
                <div class="col fs-5">3</div>
            </button>

            <button class="row border border-1 mt-3 btn-outline-dark rounded-1">
                <div class="col fs-5">Movie</div>
                <div class="col fs-5">1</div>
            </button>

            <button class="row border border-1 mt-3 btn-outline-dark rounded-1">
                <div class="col fs-5">Group</div>
                <div class="col fs-5">1</div>
            </button>

            <button class="row border border-1 mt-3 btn-outline-dark rounded-1">
                <div class="col fs-5">Review</div>
                <div class="col fs-5">1</div>
            </button>

        </div>
        <div class="col-7 ml-5">
            
            <a href="#" class="row border border-1  text-dark bg-light rounded-2 py-3">
                <div class="col fs-5 mx-5">FightClub_Fan101</div>
                <div class="col fs-5 ml-5">João Batata</div>
            </a>

            <a href="#" class="row border border-1 mt-3 text-dark bg-light rounded-2 py-3">
                <div class="col fs-5 mx-5">FightClubSuck99</div>
                <div class="col fs-5 ml-5">Pedro Rodrigues</div>
            </a>

            <a href="#" class="row border border-1 mt-3 text-dark bg-light rounded-2 py-3">
                <div class="col fs-5 mx-5">FightClubIsLife</div>
                <div class="col fs-5 ml-5">Chuck Sherman</div>
            </a>
            
        </div>
    </div>
</section>
    



<?php
draw_footer();