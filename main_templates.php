<?php
function draw_head(){ ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">


    <title>Movie Club</title>
</head>

<body>
    <?php
}

function draw_footer(){
 ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
}

function draw_header_visitor(){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="main_page.php">Movie Club</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Movies</a>
                </li>
            </ul>
            <ul class="navbar-nav me-5">
                <form class="d-flex nav-item">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <button class="btn btn-outline-success me-2 nav-item" type="button"
                    onclick="window.location.href='login.php'">Login</button>
                <button class="btn btn-outline-success me-2 nav-item" type="button"
                    onclick="window.location.href='signup.php'">Sign Up</button>
            </ul>
        </div>
    </div>
</nav>
<?php
}

function draw_top_main_list(){
    
?>
<div class="welcome-header px-3 py-auto pt-md-4 pb-md-4 mx-auto text-center mt-2 mt-md-5">
    <h1 class="display-1">
        Welcome to Movie Club
    </h1>
    <h4 class="display-7">
        The first rule of Movie Club is we do(n't) talk about Movie Club.
    </h4>
</div>
<div class="container text-center mt-2 mt-md-5">
    <?php
}

function draw_bottom_main_list()
{
 ?>
    <button type="button" class="btn btn-lg btn-block btn-primary mt-3 mt-md-5 wide" onclick="window.location.href='#'">
        Or check out the most recent reviews

    </button>
    <div class=" row">
        <div class="col card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/fightclubposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary stretched-link wide">Fight Club</a>
                </h5>
            </div>
        </div>

        <div class="col card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/djangounchainedposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide">Django Unchained</a>
                </h5>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6  col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/vforvendettaposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide">V for Vendetta</a>
                </h5>
            </div>
        </div>
        <div class="col  card col-lg-3 col-md-6 col-12 card mb-3">
            <img class="card-img-top img-responsive" src="images/inceptionposter.jpg" alt="fight club poster">
            <div class="card-body">
                <h5 class="card-title text-nowrap">
                    <a href="#" class="btn btn-primary  stretched-link wide ">Inception</a>
                </h5>
            </div>
        </div>
    </div>
</div>
<?php
}