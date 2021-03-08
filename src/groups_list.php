<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user(); ?>
<section class="container">
    <div class="text-center my-5">
        <h4 class="display-5">
            John Doe's Groups
        </h4>
    </div>
</section>
<div class="col-xl-8 col-lg-10 col-12  mx-auto my-2">
    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Uglies</a>
                    <p class="card-text text-center mt-3">8 members</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/deadpoets.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Dead Poets</a>
                    <p class="card-text text-center mt-3">4 members</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avengers.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Avengers of Today</a>
                    <p class="card-text text-center mt-3">8 members</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/basterds.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Basterds</a>
                    <p class="card-text text-center mt-3">8 members</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">The Elitits</a>
                    <p class="card-text text-center mt-3">23 members</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Great Ones</a>
                    <p class="card-text text-center mt-3">2 members</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Avengers of Tomorrow</a>
                    <p class="card-text text-center mt-3">1 members</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/breakfastclub.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <a href="group_page.php" class="btn btn-primary mx-auto stretched-link">Breakfast Club</a>
                    <p class="card-text text-center mt-3">9 members</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
draw_footer();