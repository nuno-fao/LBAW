<?php
include_once "main_templates.php";
draw_head();
draw_navbar_admin_adminmode(); ?>

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
            Banned Users
        </h3>
        
    </div>
</section>

<section class="container">
    <div class="row align-items-center justify-content-center">
        
        <div class="col-8 ml-5">
            
            <div class="">
                <a href="#" class="row border border-1  text-dark bg-light rounded-2 py-3">
                    <div class="col fs-5 mx-5">FeanorDidNothingWrong</div>
                    <div class="col fs-5 ml-5">Ruben Amorim</div>
                </a>
                <a href="#" class="d-flex justify-content-end text-dark">
                    Revoke
                </a>        
            </div>

            <div class="">
                <a href="#" class="row border border-1 mt-3 text-dark bg-light rounded-2 py-3">
                    <div class="col fs-5 mx-5">Bagman99</div>
                    <div class="col fs-5 ml-5">Ludo Bagman</div>
                </a>
                <a href="#" class="d-flex justify-content-end text-dark">
                    Revoke
                </a>        
            </div>

            <div class="">
                <a href="#" class="row border border-1 mt-3 text-dark bg-light rounded-2 py-3">
                    <div class="col fs-5 mx-5">Sherminator99</div>
                    <div class="col fs-5 ml-5">Chuck Sherman</div>
                </a>
                <a href="#" class="d-flex justify-content-end text-dark">
                    Revoke
                </a>        
            </div>

            
        </div>
    </div>
</section>
    



<?php
draw_footer();