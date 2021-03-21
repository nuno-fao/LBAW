<?php
include_once "main_templates.php";
include_once "management_board_templates.php";
draw_head();
draw_navbar_admin_adminmode(); 

$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Management","#"));
$arr->append(new Breadcrumb("Users Board","users_board.php"));


draw_breadcrumb($arr);

function draw_user($user){ ?>
<div class="card no-padding mx-auto mt-3" id="request_1">
    <div class="card-body  d-flex justify-content-between">
        <p class="card-text my-auto"><a href="user_profile.php"><?=$user?></a> has been Banned
        </p>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_1_accept">Revoke</a>
        </div>
    </div>
</div>
<?php
}

?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 row mx-auto">
    <?=draw_aside_u()?>
    <section class="col-xl-7 col-lg-6 col-12 scrollit me-auto ms-auto">
        <h4 class="mt-3 text-center mb-5">
            Banned Users
        </h4>
        <section class="d-flex flex-column mx-auto">
            <div class="col-xl-8 col-lg-10 col-12 mx-auto">

                <?php
                draw_user("FeanorDidNothingWrong");
                draw_user("Bagman99");
                draw_user("Sherminator99");
                ?>
            </div>
        </section>
    </section>
</div>




<?php
draw_footer();