<?php
include_once "main_templates.php";
draw_head();
draw_navbar_visitor();

$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Login","login.php"));

draw_breadcrumb($arr);

?>
<div class="mt-lg-5 mt-3 container">
    <div class="bg-primary col-lg-6 col-md-8 col-12 mx-auto py-5 px-5 login_form">
        <div class="text-center mb-5 text-light pb-2">
            <h3>Login to <strong>Movie Club</strong></h3>
        </div>
        <form action="user_profile.php" method="post">
            <div class="form-group mb-3 mt-3 py-2">
                <label class="text-light" for="username">Username</label>
                <input type="text" class="form-control" placeholder="johndoe" id="username">
            </div>
            <div class="form-group mb-3 mt-3 py-2">
                <label class="text-light" for="username">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password">
            </div>
            <input type="submit" value="Login" class="btn btn-block btn-secondary">
        </form>
    </div>
</div>
<?php
draw_footer();