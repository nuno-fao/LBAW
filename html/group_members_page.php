<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user(); 

$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Groups List","groups_list.php"));
$arr->append(new Breadcrumb("Group","group_page.php"));
$arr->append(new Breadcrumb("Group Members","#"));

draw_breadcrumb($arr);


?>
<section class="container">
    <div class="text-center my-5">
        <h3 class="display-5">
            Justice League Members
        </h3>
    </div>
</section>
<div class="col-xl-8 col-lg-10 col-12  mx-auto my-2">
    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <p class="card-text text-center">Luís Santos</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">luisdosgolos</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar2.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Jõao Batata</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">jb4ever</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar3.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Vasco Santorini</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">v5sant</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar4.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Jimmy Page</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">guitargod</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar5.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <p class="card-text text-center">Jake Holmes</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">dazedandconfused</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar6.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Lucille</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">es355</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <p class="card-text text-center">Jorge Pais</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">jjpais</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar2.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">John Bonham</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">greatbonzo</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar1.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column d-flex justify-content-center">
                    <p class="card-text text-center">Tyler Durden</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">maniacboy</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar2.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Levine Longbottom</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">weirdboy</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar3.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Tom Riddle</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">topmurderer</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <img src="images/avatar4.png" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <p class="card-text text-center">Marc Bolan</p>

                    <a href="user_profile.php" class="btn btn-primary mx-auto stretched-link">glamgod</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
draw_footer();