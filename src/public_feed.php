<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
?>
<div class="row feed">
    <div class="col col-12 col-lg-9">
        <h4 class="display-6">Public Reviews Feed</h4>
        <div class="col review card mt-3">
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