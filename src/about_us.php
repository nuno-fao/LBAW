<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("About Us","#"));

draw_breadcrumb($arr);
?>
<div class="container">
    <h1 class="display-4 mt-3">
        About Us
    </h1>
    <div class="row mt-3">
        <h6 class="lead col-12 col-lg-8">
            This project aims to develop a social network for movie aficionados, allowing
            them to share and discuss their passion for movies with others.
            <br>
            <br>
            We believe that a movie specific social network allows people to connect and talk about their passion
            without the usual disturbance of general purpose social networks so in this context our website will be
            closer towards the IMDb type of product. With this in mind our users will be able to review movies and alike
            but we also offer the possibility to make the reviews private and to create named groups and our main page
            will focus around seeing all the latest reviews.
        </h6>
        <div class="lead col-12 col-lg-4">
            <img class="card-img-top img-responsive" src="images/main_page_print.png" alt="main_page">
        </div>
    </div>
    <div class=" row my-5">
        <div class="col card col-lg-3 col-md-6 col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="images/rocas777.jpeg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide">Miguel Pinto</a>
                </h5>
                <a href="#" class="btn btn-primary  stretched-link wide">up201806206@fe.up.pt</a>
            </div>
        </div>
        <div class="col card col-lg-3 col-md-6 col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="images/nunation.png" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary stretched-link wide">Nuno Oliveira</a>
                </h5>
                <a href="#" class="btn btn-primary  stretched-link wide">up201806525@fe.up.pt</a>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6  col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="images/luis.png" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide">Luís Miranda</a>
                </h5>
                <a href="#" class="btn btn-primary  stretched-link wide">up201704093@fe.up.pt</a>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6 col-12 card mb-3 no-padding">
            <img class="card-img-top img-responsive" src="images/francisco.png" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide ">Francisco Marques</a>
                </h5>
                <a href="#" class="btn btn-primary  stretched-link wide">up201603694@fe.up.pt</a>
            </div>
        </div>
    </div>
</div>
<?php
draw_footer();