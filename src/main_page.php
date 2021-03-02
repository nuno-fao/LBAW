<?php
include_once "main_templates.php";
draw_head();
draw_header_visitor();
draw_top_main_list();
?>
<div class="card mb-3 mb-auto">
    <div class="card-header">
        <h4 class="my-1 font-weight-normal display-6">Join Us Now!</h4>
    </div>
    <div class="card-body">
        <div class="btn-group-vertical mr-2">
            <button type="button" class="btn btn-lg btn-block btn-primary" onclick="window.location.href='signup.php'">
                <h4>Sign up</h4>
            </button>
            <button type=" button" class="btn btn-lg btn-block btn-primary mt-3"
                onclick="window.location.href='login.php'">
                <h4>Login</h4>
            </button>
        </div>
    </div>
</div>
<?php
draw_bottom_main_list();
draw_footer();