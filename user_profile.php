<?php
include_once "main_templates.php";
draw_head();
draw_header_normal_user();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col col-12 col-lg-6" id="user-left-block">
            <div class="card" id="user-info-card">
                <div class="row">
                    <div class="col col-6 d-flex flex-column" id="info">
                        <label class="display-6">John Doe</label>
                        <label class="mt-5">johndoe</label>
                        <label class="mt-2">johndoe00@notexisting.com</label>
                    </div>
                    <div class="col col-6" id="photo">
                        <img class="card-img-top img-responsive user-pic" src="images/user_pic.png"
                            alt="fight club poster">
                    </div>
                </div>
            </div>
            <div class="row ms-auto me-auto " id="reviews__and_friends">
                <div class="list-group col col-lg-6 col-12 funny-list">
                    <h4>
                        Latest Ratings
                    </h4>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Fight Club</h5>
                        </div>
                        <p class="mb-1">9 Stars</p>
                    </a>
                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Se7en</h5>
                        </div>
                        <p class="mb-1">7 Stars</p>
                    </a>

                    <a href=" #" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">V for Vendetta</h5>
                        </div>
                        <p class="mb-1">8 starts</p>
                    </a>
                </div>
                <div class="list-group col col-lg-6 col-12 funny-list">
                    <h4>
                        Friends
                    </h4>
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
            </div>
        </div>
        <div class="col col-lg-6 col-12" id="user-right-block">
        </div>
    </div>
</div>
<?php
draw_footer();