<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();

$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Notifications","#"));


draw_breadcrumb($arr);

?>
<div class="container d-flex flex-column">
    <div class="display-5 text-center my-2">
        Invite to Group
    </div>

    <div class="row d-flex justify-content-center">
        <img src="images/avatar1.jpg" class="card-img-top col-lg-2" alt="...">
        <div class="card no-padding mt-3 col-12 col-lg-7 " id="request_0">
            <div class="card-body d-flex justify-content-between">
                <p class="card-text my-auto fs-4"><a href="user_profile.php">@gervasio123</a> </p>
                <p class="card-text my-auto fs-4"> Gervásio Pereira</p>
                
                <div class="d-flex ">
                    <a href="#" class="btn btn-primary ms-3 request_button my-auto mr-5 " id="request_0_accept">Invite</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-2">
        <img src="images/avatar2.png" class="card-img-top col-lg-2" alt="...">
        <div class="card no-padding mt-3 col-12 col-lg-7 " id="request_0">
            <div class="card-body d-flex justify-content-between">
                <p class="card-text my-auto fs-4"><a href="user_profile.php">@woodfire</a> </p>
                <p class="card-text my-auto fs-4"> Fernando Rodrigues</p>
                
                <div class="d-flex ">
                    <a href="#" class="btn btn-primary ms-3 request_button my-auto mr-5 " id="request_0_accept">Invite</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-2">
        <img src="images/avatar3.png" class="card-img-top col-lg-2" alt="...">
        <div class="card no-padding mt-3 col-12 col-lg-7 " id="request_0">
            <div class="card-body d-flex justify-content-between">
                <p class="card-text my-auto fs-4"><a href="user_profile.php">@familyguy</a> </p>
                <p class="card-text my-auto fs-4"> Peter Griffin</p>
                
                <div class="d-flex ">
                    <a href="#" class="btn btn-primary ms-3 request_button my-auto mr-5 " id="request_0_accept">Invite</a>
                </div>
            </div>
        </div>
    </div>
        

    
</div>
<?php
draw_footer();