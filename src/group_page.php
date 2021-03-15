<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();

$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Groups List","groups_list.php"));
$arr->append(new Breadcrumb("Group Page","#"));

draw_breadcrumb($arr);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 mt-5 row mx-auto">
    <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed">
        <div class="card ">
            <div class="card-body ">
                <div class="d-flex flex-row align-items-center text-start ">
                    <div class="mt-3 mr-3">
                        <h4>Big Nerds</h4>
                        <p class="font-size-sm">Group Dedicated to movie nerds</p>
                        <button class="btn btn-primary">Leave Group</button>
                    </div>
                    <img src="images/basterds.png" alt="Admin" class="rounded" width="150">
                    
                </div>
            </div>
        </div>
        <section>
            <div class="text-center">
                <h4 class="mt-3">Group Members</h4>
                <a class="nav-link py-0" href="group_members_page.php">view all</a>
                
            </div>
            <section class="d-flex flex-lg-row flex-column" id="down_section">
                <div class="row col-md-6 col-12 ms-auto me-auto my-4 mx-1">
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Mickey Mouse</h5>
                        </div>
                        <p class="mb-1">@the_real_mickey</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">The Beast</h5>
                        </div>
                        <p class="mb-1">@im_the_beast</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Beauty</h5>
                        </div>
                        <p class="mb-1">@im_a_beauty</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Donald Duck</h5>
                        </div>
                        <p class="mb-1">@quack_like_champ</p>
                    </a>
                </div>
                <div class="row ms-auto me-auto my-4 mx-1">
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sonic</h5>
                        </div>
                        <p class="mb-1">@fasterthanflash</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Androis</h5>
                        </div>
                        <p class="mb-1">@imagreendroid</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sleepy Beaty</h5>
                        </div>
                        <p class="mb-1">@sleep4ever</p>
                    </a>
                    <a href="user_profile.php" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Snopy</h5>
                        </div>
                        <p class="mb-1">@hatelife</p>
                    </a>
                </div>
            </section>
            <div class="text-right">   
                <a href="group_invite.php" class="btn btn-primary">Invite Friends</a>
            </div>
            
        </section>
    </aside>
    <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
        <h4 class="text-center">
            Group Exclusive Reviews
        </h4>
        <?php
        draw_review_1();
        draw_review_2();
        draw_review_1();
        draw_review_2();
        draw_review_1();
        draw_review_2();
        ?>
    </section>
</div>
<?php
draw_footer();