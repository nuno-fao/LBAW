<?php
include_once "main_templates.php";
draw_head();
draw_navbar_visitor();
$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));

draw_breadcrumb($arr);
?>
<div class="welcome-header px-3 py-auto pt-md-4 pb-md-4 mx-auto text-center mt-2 mt-md-2">
    <h1 class="display-3">
        Welcome
    </h1>
    <div>
        <p class="col-12 col-lg-6 mx-auto">Movie Club is a Social network for the movie aficionados that allows people
            to talk,
            discuss
            and share their
            thoughts about the movies, also recommend and get recommendations for the next film to watch.
        </p>
    </div>
</div>
<div class="container text-center">
    <button type="button" class="btn btn-lg btn-block btn-primary my-3 mx-auto wide w-50"
        onclick="window.location.href='feed.php'">
        Or check out the most recent reviews
    </button>

    <div class=" row">
        <div class="col card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/fightclubposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="movie_page_visitor.php" class="btn btn-primary stretched-link wide">Fight Club</a>
                </h5>
            </div>
        </div>

        <div class="col card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/djangounchainedposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="movie_page_visitor.php" class="btn btn-primary  stretched-link wide">Django Unchained</a>
                </h5>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6  col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/vforvendettaposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="movie_page_visitor.php" class="btn btn-primary  stretched-link wide">V for Vendetta</a>
                </h5>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/inceptionposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="movie_page_visitor.php" class="btn btn-primary  stretched-link wide ">Inception</a>
                </h5>
            </div>
        </div>
    </div>
</div>
<?php
draw_footer();