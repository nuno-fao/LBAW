<?php
include_once "main_templates.php";
draw_head();
draw_navbar_visitor();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 mt-2 row  ">
    <section id="user_info" class="col-xl-4 col-lg-5 col-12 mt-3">
        <div class="card ">
            <div class="card-body ">
                <div class="d-flex flex-row justify-content-around align-items-start text-start ">
                    <div class="mt-3 gap-5">
                        <h4 class="mt-0">Fight Club</h4>
                        <p class="text-secondary mb-1 mt-3">1999</p>
                        <p class="text-secondary mb-1">8.7/10 stars</p>
                        <p class="text-secondary mb-1 mt-5">Drama, Action, Crime</p>
                        
                    </div>
                    <img src="images/fightclubposter.jpg" alt="Admin" class="rounded ml-5" width="150">
                    
                </div>
            </div>
        </div>
        <section>

  
            
        </section>
    </section>
    <section class="col-xl-8 col-lg-7 col-12 scrollit mt-2">
        <h4 class="text-center">
            Reviews
        </h4>
        <?php
        draw_review_moviepg_1();
        draw_review_moviepg_2();
        ?>
    </section>
</div>
<?php
draw_footer();