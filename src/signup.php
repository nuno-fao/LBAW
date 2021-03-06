<?php
include_once "main_templates.php";
draw_head();
draw_navbar_visitor();
draw_top_main_list();
?>
<div id="login_block">
    <div id="login_form">
        <div class="text-center mb-5">
            <h3>Login to <strong>Movie Club</strong></h3>
            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
        </div>
        <form action="login.php" method="post">
            <div class="form-group mb-3 ">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="John Doe" id="name">
            </div>
            <div class="form-group mb-3 ">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="johndoe" id="username">
            </div>
            <div class="form-group mb-3 ">
                <label for="email">Username</label>
                <input type="text" class="form-control" placeholder="email@example.com" id="email">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password">
            </div>
            <div class="form-group mb-3">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Your Password" id="password-confirm">
            </div>
            <input type="submit" value="Sign Up" class="btn btn-block btn-primary wide">

        </form>
    </div>
</div>
<?php
draw_bottom_main_list();
draw_footer();