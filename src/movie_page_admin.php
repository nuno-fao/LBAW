<?php
include_once "main_templates.php";
draw_head();
draw_navbar_admin_usermode();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-lg-12 col-12 mt-2 row mx-auto">
    <aside id="user_info" class="col-xl-4 col-lg-5 col-12 fixed">
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
        <div class="my-auto text-end text-danger mr-2">
                <a class="text-danger" href="#">Edit Movie</a>
            </div>
        <section>

        <form class="card mt-3">
            <div class="card-body ">
                <div class=" align-items-start text-start ">
                    <div class="mt-0 ">
                        
                        <h4 class="mt-0">Add a Review</h4>

                        <label for="title" class="form-label mt-1 ">Title</label>
                        <input type="text" class="col-7 form-control border border-1rounded-1 " id="title" aria-describedby="title">

                        <label for="description" class="form-label mt-3 ">Description</label>
                        <textarea type="text" rows="3" class="row-4 form-control border border-1rounded-1 mt-0" id="description" aria-describedby="description"></textarea>

                        <div class="d-flex justify-content-end ">
                            <input class="btn btn-outline-secondary mt-3 mb-3 " type="submit" value="Submit">
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
            
        </section>
    </aside>
    <section class="col-xl-8 col-lg-7 col-12 scrollit me-3 ms-auto">
        
        <?php
        draw_review_1_admin();
        draw_review_1_admin();
        draw_review_1_admin();
        ?>
    </section>
</div>
<?php
draw_footer();