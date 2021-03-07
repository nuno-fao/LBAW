<?php
include_once "main_templates.php";
draw_head();
draw_navbar_visitor();
?>
<div class="mt-lg-5 mt-3 container d-flex flex-column">
    <div class="text-center mb-4">
        <b>Personal Details</b> > Account Setup
    </div>
    <div>
        <div class="bg-primary col-lg-6 col-md-8 col-12 mx-auto py-5 px-5 login_form">
            <div class="text-center mb-5 text-light pb-2">
                <h3>Register in <strong>Movie Club</strong></h3>
            </div>
            <form action="signup_second.php" method="post">
                <div class="form-group mb-3 text-light">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="John Doe" id="name">
                </div>
                <div class="form-group mb-3  text-light">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" placeholder="johndoe@example.com" id="email">
                </div>
                <div class="form-group mb-3 d-flex flex-column  text-light">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" class="form-control" name="birthday">
                </div>
                <input type="submit" value="Next" class="btn btn-block btn-secondary wide mt-5">
            </form>
        </div>
    </div>
</div>
<?php
draw_footer();