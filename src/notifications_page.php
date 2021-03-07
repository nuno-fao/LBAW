<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
?>
<div class="container d-flex flex-column">
    <div class="display-5 text-center my-5">
        Pending Notifications
    </div>

    <div class="card col-12 col-lg-6 no-padding mx-auto mt-3" id="request_0">
        <div class="card-header bg-secondary text-primary">
            Friend Request
        </div>
        <div class="card-body">
            <p class="card-text"><a href="group_page.php">Beast</a> sent you a friend request</p>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_0_accept">Accept</a>
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_0_decline">Decline</a>
            </div>
        </div>
    </div>
    <div class="card col-12 col-lg-6 no-padding mx-auto mt-3" id="request_1">
        <div class="card-header bg-primary text-light">
            Group Request
        </div>
        <div class="card-body">
            <p class="card-text"><a href="group_page.php">Movie Elitists</a> invited you to join their group</p>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_1_accept">Accept</a>
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_1_decline">Decline</a>
            </div>
        </div>
    </div>
    <div class="card col-12 col-lg-6 no-padding mx-auto mt-3" id="request_2">
        <div class="card-header bg-primary text-light">
            Group Request
        </div>
        <div class="card-body">
            <p class="card-text"><a href="group_page.php">Justice League</a> invited you to join their group</p>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_2_accept">Accept</a>
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_2_decline">Decline</a>
            </div>
        </div>
    </div>
    <div class="card col-12 col-lg-6 no-padding mx-auto mt-3" id="request_3">
        <div class="card-header bg-secondary text-primary">
            Friend Request
        </div>
        <div class="card-body">
            <p class="card-text"><a href="group_page.php">Gervásio</a> sent you a friend request</p>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_3_accept">Accept</a>
                <a href="#" class="btn btn-primary ms-3 request_button" id="request_3_decline">Decline</a>
            </div>
        </div>
    </div>
</div>
<?php
draw_footer();