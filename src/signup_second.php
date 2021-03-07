<?php
include_once "main_templates.php";
draw_head();
draw_navbar_visitor();
?>
<div class="mt-lg-5 mt-3 container">
    <div class="text-center mb-4">
        Personal Details > <b>Account Setup</b>
    </div>
    <div>
        <div class="bg-primary col-lg-6 col-md-8 col-12 mx-auto py-5 px-5 login_form">
            <div class="text-center mb-5 text-light pb-2">
                <h3>Register in <strong>Movie Club</strong></h3>
            </div>
            <form action="loin.php" method="post">
                <div class="form-group mb-3 text-light">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" placeholder="johndoe" id="name">
                </div>
                <div class="form-group mb-3  text-light">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass">
                </div>
                <div class="form-group mb-3  text-light">
                    <label for="cpass">Confirm Password</label>
                    <input type="password" class="form-control" id="cpass">
                </div>
                <div class="d-flex mt-5">
                    <button class="btn btn-secondary wide me-3" onclick="window.location.href='signup.php'"
                        type="button">
                        Go Back
                    </button>
                    <button class="btn btn-secondary wide" onclick="window.location.href='login.php'" type="button">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
draw_footer();