<?php
include_once "main_templates.php";
include_once "management_board_templates.php";
draw_head();
draw_navbar_admin_usermode();


$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Management","#"));
$arr->append(new Breadcrumb("Review Board","review_board.php"));

draw_breadcrumb($arr);

function draw_report($title,$user,$movie, $reports) { ?>

<div class="review card mt-3 bg-dark text-light">
    <div class="card-header row review-header">
        <h4 class="col col-12 col-lg-9 no-padding">
            <?=$title?>
        </h4>
        <div class="col col-12 col-lg-3 review-author no-padding">
            <a class="btn text-light" href="user_profile.php">
                <?=$user?>
            </a>
        </div>
        <div class="col col-12 no-padding">
            <small col>
                <?=$movie?>
            </small>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-end">
            <span class="text-light my-auto ms-3">
                Reported <?=$reports?> times
            </span>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn text-light">
                View
            </a>
            <a class="btn text-light">
                Discard
            </a>
            <a class="btn text-light">
                Delete
            </a>
        </div>
    </div>
</div>
<?php
}

?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 mt-5 row mx-auto">
    <?=draw_aside()?>
    <section class="col-xl-7 col-lg-6 col-12 scrollit me-auto ms-auto">
        <h4 class="mt-3 text-center mb-5">
            Reported Reviews
        </h4>
        <section class="d-flex flex-column mx-auto">
            <?php
                draw_report('I hate this sh**','John Doe','Fight club', '102');
                draw_report('Worst Ever','Jane Doe','Fight club', '99');
                draw_report('This guy is awful','Janice','Fight club', '97');
                draw_report('Good Lord!!!!','Robert Plant','Fight club', '47');
                draw_report('Loved It','John Doe','Lord of the Rings', '34');
                draw_report('Better than Twiligh But....','John Doe','Harry Potter', '10');
            ?>
        </section>
    </section>
</div>
<?php
draw_footer();