<?php
function draw_head(){ ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="css/old_style.css">

    <title>Movie Club</title>
</head>

<body>
    <?php
}

function draw_footer(){
 ?>
    <footer class="text-center text-white fixed-bottom scroll" style="background-color: #0a4275;">
        <div class="d-flex p-2 justify-content-around">
            <span>The first rule about Movie Club Is we do(n't) talk about Movie Club</span>
            <!--//todo correct link -->
            <a class="text-white" href="#">About Us</a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/footer.js"></script>
</body>

</html>

<?php
}

function draw_navbar_visitor(){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="public_feed.php"><img id="logo-img" src="images/logo.png" alt="Movie Club"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-auto ms-5 me-3 row my-auto mt-lg-auto mt-4"
            id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-3 col-12">
                <div class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Movies</a>
                </div>
            </div>
            <form class="d-flex nav-item me-auto col-lg-5 col-12 ps-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="navbar-nav col-lg-4 col-12 d-flex justify-content-end mt-lg-auto mt-4">
                <button class="btn btn-outline-success nav-item me-lg-3 mb-lg-auto mb-2" type="button"
                    onclick="window.location.href='login.php'">Login</button>
                <button class="btn btn-outline-success nav-item" type="button"
                    onclick="window.location.href='signup.php'">Sign Up</button>
            </div>
        </div>
    </div>
</nav>
<?php
}

function draw_navbar_normal_user(){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="public_feed.php"><img id="logo-img" src="images/logo.png" alt="Movie Club"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-auto ms-5 me-3 row my-auto mt-lg-auto mt-4"
            id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-3 col-12">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Movies</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Groups</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Friends Feed</a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex nav-item me-auto col-lg-5 col-12 ps-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="navbar-nav col-lg-4 col-12 d-flex justify-content-end mt-lg-auto mt-4">
                <div class="mt-auto mb-auto me-3">
                    <i class="fa fa-bell" style="font-size:24px"></i>
                </div>
                <div class="nav-item me-3">
                    <a class="nav-link" aria-current="page" href="#">johndoe</a>
                </div>
                <button class="btn btn-outline-success me-2 nav-item" type="button"
                    onclick="window.location.href='user_profile.php'">Logout</button>
            </div>
        </div>
    </div>
</nav>
<?php
}

function draw_navbar_admin_usermode(){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="public_feed.php"><img id="logo-img" src="images/logo.png" alt="Movie Club"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-auto ms-5 me-3 row my-auto mt-lg-auto mt-4"
            id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-3 col-12">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Movies</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Groups</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Friends Feed</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Management</a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex nav-item me-auto col-lg-4 col-12 ps-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="navbar-nav col-lg-5 col-12 d-flex justify-content-end mt-lg-auto mt-4">
                <button class="btn btn-outline-success me-lg-4 nav-item me-2 mb-2 mb-lg-auto" type="button"
                    onclick="window.location.href='user_profile.php'">User Mode</button>
                <div class="mt-auto mb-auto me-3">
                    <i class="fa fa-bell" style="font-size:24px"></i>
                </div>
                <div class="nav-item me-3">
                    <a class="nav-link" aria-current="page" href="#">johndoe</a>
                </div>
                <button class="btn btn-outline-success me-2 nav-item" type="button"
                    onclick="window.location.href='user_profile.php'">Logout</button>
            </div>
        </div>
    </div>
</nav>
<?php
}

function draw_navbar_admin_adminmode(){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="public_feed.php"><img id="logo-img" src="images/logo.png" alt="Movie Club"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-auto ms-5 me-3 row my-auto mt-lg-auto mt-4"
            id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-3 col-12">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Movies</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Groups</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Friends Feed</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="nav-link" aria-current="page" href="#">Management</a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex nav-item me-auto col-lg-4 col-12 ps-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="navbar-nav col-lg-5 col-12 d-flex justify-content-end mt-lg-auto mt-4">
                <button class="btn btn-outline-success me-lg-4 nav-item me-2 mb-2 mb-lg-auto" type="button"
                    onclick="window.location.href='user_profile.php'">Admin Mode</button>
                <div class="mt-auto mb-auto me-3">
                    <i class="fa fa-bell" style="font-size:24px"></i>
                </div>
                <div class="nav-item me-3">
                    <a class="nav-link" aria-current="page" href="#">johndoe</a>
                </div>
                <button class="btn btn-outline-success me-2 nav-item" type="button"
                    onclick="window.location.href='user_profile.php'">Logout</button>
            </div>
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