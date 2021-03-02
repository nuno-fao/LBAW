<?php
include_once "main_templates.php";
draw_head();
draw_header_normal_user();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="col col-lg-6 col-12 d-flex flex-column mt-3 mb-3" id="user-right-block">
            <h4>
                Latest Reviews
            </h4>
            <div class="review card mt-3">
                <div class="card-header row review-header">
                    <div class="col col-12 col-lg-9 no-padding">
                        Great Actors, Dreadful Movie</div>
                    <div class="col col-12 col-lg-3 review-author no-padding">
                        <small>
                            by John Doe
                        </small>
                    </div>
                    <div class="col col-12 no-padding">
                        <small col>
                            Fight Club
                        </small>
                    </div>
                </div>
                <div class="card-body">
                    The movie has wonderful actors, both Brad Pitt and Edward Norton pull an amazing job.... but God !!!
                    the movie is so boring with long and not understandable dialogs. Worst of all, they all look like
                    they come from Arkham Asylum
                </div>
                <div class="card-footer row review-footer">
                    <div class="like_button col no-padding">
                        <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 23</i>
                    </div>
                    <div class="col no-padding text-end">
                        0 comments
                    </div>
                </div>
            </div>
            <div class="review card mt-3">
                <div class="card-header row review-header">
                    <div class="col col-12 col-lg-9 no-padding">
                        Best Movie Ever</div>
                    <div class="col col-12 col-lg-3 review-author no-padding">
                        <small>
                            by John Doe
                        </small>
                    </div>
                    <div class="col col-12 no-padding">
                        <small col>
                            V for Vendetta
                        </small>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    The movie is worderful, Natalie Portamans does a great job in capturing all the feelings of someone
                    who is afraid but at the same time wants so change the things.
                    However, the end is a bit sad and i was expenting that V could live another day and continue to
                    inpire the revolution.
                </div>
                <div class="card-footer row review-footer">
                    <div class="like_button col no-padding">
                        <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 56</i>
                    </div>
                    <div class="col no-padding text-end">
                        10 comments
                    </div>
                </div>
                <div class="d-flex flex-column comment-section mt-3">
                    <div class="comment">
                        <div class="comment-author d-flex">
                            <img class="card-img-top img-responsive user-pic" src="images/user_pic.png"
                                alt="fight club poster">
                            <span class="mt-auto mb-auto">
                                Beauty
                            </span>
                        </div>
                        <div class="comment-data">
                            Bla Bla Bla, you don't now anything about movies!!!!!! you "basterd"!!!
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment-author d-flex">
                            <img class="card-img-top img-responsive user-pic" src="images/user_pic.png"
                                alt="fight club poster">
                            <span class="mt-auto mb-auto">
                                Donald Duck
                            </span>
                        </div>
                        <div class="comment-data">
                            I've seen better.. but yes it is a great movie, but it doesn't quite transmits the same
                            feeling as the comic
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
draw_footer();