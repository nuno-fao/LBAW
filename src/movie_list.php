<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user(); 


$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Movies","#"));


draw_breadcrumb($arr);

?>

<div class="col-xl-8 col-lg-10 col-12  mx-auto my-2">
    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <a class="card  no-padding" href="movie_page.php">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Django Unchained</p>
                    <p class="card-text text-center mt-0">(2012)</p>
                </div>
                <img src="images/djangounchainedposter.jpg" class="card-img-top" alt="...">
                
            </a>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Fight Club</p>
                    <p class="card-text text-center mt-0">(1999)</p>
                </div>
                <img src="images/fightclubposter.jpg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Inception</p>
                    <p class="card-text text-center mt-0">(2010)</p>
                </div>
                <img src="images/inceptionposter.jpg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">V for Vendetta</p>
                    <p class="card-text text-center mt-0">(2005)</p>
                </div>
                <img src="images/vforvendettaposter.jpg" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Interstellar</p>
                    <p class="card-text text-center mt-0">(2014)</p>
                </div>
                <img src="images/interstellarposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Lion King</p>
                    <p class="card-text text-center mt-0">(1994)</p>
                </div>
                <img src="images/lionkingposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Pulp Fiction</p>
                    <p class="card-text text-center mt-0">(1994)</p>
                </div>
                <img src="images/pulpfiction.jpg" class="card-img-" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">The Lord of the Rings The Return of the King</p>
                    <p class="card-text text-center mt-0 ">(2003)</p>
                </div>
                <img src="images/lordoftheringsposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Forrest Gump</p>
                    <p class="card-text text-center mt-0">(1994)</p>
                </div>
                <img src="images/forrestgumpposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Toy Story</p>
                    <p class="card-text text-center mt-0">(1995)</p>
                </div>
                <img src="images/toystoryposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Thor</p>
                    <p class="card-text text-center mt-0">(2011)</p>
                </div>
                <img src="images/thorposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
        <div class="col-lg-3 col-6 mx-auto mt-1">
            <div class="card  no-padding">
                <div class="card-body d-flex flex-column d-flex justify-content-center fs-6 gap-0 p-3">
                    <p class="card-text text-center mb-0 text-truncate">Shawshank Redemption</p>
                    <p class="card-text text-center mt-0">(1994)</p>
                </div>
                <img src="images/shawshankposter.jpg" class="card-img-" alt="...">
            </div>
        </div>
    </div>
</div>

<?php
draw_footer();