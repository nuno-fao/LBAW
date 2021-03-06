<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
?>
<div class="row feed">
    <div class="col col-12 col-lg-9">
        <h4 class="display-6">Public Reviews Feed</h4>
        <?php
        draw_review_1();
        draw_review_2();
        ?>
    </div>
    <div class="col col-0 col-lg-1 col-lf-offset">
    </div>
    <div class="col col-12 col-lg-2 d-flex flex-column film">
        <h4 class=" mb-3">Top Films</h4>
        <div class="card mb-3">
            <img class="card-img-top img-responsive" src="images/fightclubposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary stretched-link wide">Fight Club</a>
                </h5>
            </div>
        </div>

        <div class="card mb-3">
            <img class="card-img-top img-responsive" src="images/djangounchainedposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide">Django Unchained</a>
                </h5>
            </div>
        </div>
        <div class="card mb-3">
            <img class="card-img-top img-responsive" src="images/vforvendettaposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide">V for Vendetta</a>
                </h5>
            </div>
        </div>
        <div class="card mb-3">
            <img class=" card-img-top img-responsive" src="images/inceptionposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide ">Inception</a>
                </h5>
            </div>
        </div>
    </div>
</div>
<?php
draw_footer();