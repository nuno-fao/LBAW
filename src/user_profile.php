<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 mt-5 row mx-auto">
    <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed">
        <div class="card mx-auto">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/user_pic.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h4>John Doe</h4>
                        <p class="text-secondary mb-1">johndoe</p>
                        <p class="text-muted font-size-sm">20 Years Old</p>
                        <p class="font-size-sm">johndoe00@notexisting.com</p>
                        <button class="btn btn-primary">Send Request</button>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <h4 class="mt-3 text-center">
                <a class="nav-link" href="friends_page.php">Friends</a>
            </h4>
            <section class="d-flex flex-lg-row flex-row">
                <div class="row col-md-6 ms-auto me-auto my-4 mx-1">
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Mickey Mouse</h5>
                        </div>
                        <p class="mb-1">@the_real_mickey</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">The Beast</h5>
                        </div>
                        <p class="mb-1">@im_the_beast</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Beauty</h5>
                        </div>
                        <p class="mb-1">@im_a_beauty</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Donald Duck</h5>
                        </div>
                        <p class="mb-1">@quack_like_champ</p>
                    </a>
                </div>
                <div class="row col-md-6 ms-auto me-auto my-4 mx-1">
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sonic</h5>
                        </div>
                        <p class="mb-1">@fasterthanflash</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Androis</h5>
                        </div>
                        <p class="mb-1">@imagreendroid</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sleepy Beaty</h5>
                        </div>
                        <p class="mb-1">@sleep4ever</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Snopy</h5>
                        </div>
                        <p class="mb-1">@hatelife</p>
                    </a>
                </div>
            </section>
        </section>
    </aside>
    <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
        <h4 class="text-center">
            Latest Reviews
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