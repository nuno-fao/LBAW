<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
?>
<div class="container">
    <h1 class="display-4 mt-5">
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
        </div>
    </div>
</div>
<?php
draw_footer();