<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user(); 


$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Search Results","#"));

draw_breadcrumb($arr);
?>

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
            Search Results For "Fight Club"
        </h3>
    </div>
</section>

<section class="container">
    <div class="row align-items-start">

        <div class="col-3 border border-3 border-dark rounded-2 mr-5 px-4 d-grid">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-primary rounded-1 my-3">
                    <span class="col fs-5 ">All</span>
                    <span class="col fs-6 ">347</span>
                </button>
                <button type="button" class="btn btn-primary rounded-1 mb-3">
                    <span class="col fs-5 ">User</span>
                    <span class="col fs-6 ">3</span>
                </button>
                <button type="button" class="btn btn-primary rounded-1 mb-3">
                    <span class="col fs-5 ">Movie</span>
                    <span class="col fs-6 ">1</span>
                </button>
                <button type="button" class="btn btn-primary rounded-1 mb-3">
                    <span class="col fs-5 ">Group</span>
                    <span class="col fs-6 ">1</span>
                </button>
                <button type="button" class="btn btn-primary rounded-1 mb-3">
                    <span class="col fs-5 ">Review</span>
                    <span class="col fs-6 ">5</span>
                </button>
            </div>
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