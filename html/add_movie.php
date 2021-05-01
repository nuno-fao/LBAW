<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user(); 

$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Management","#"));
$arr->append(new Breadcrumb("Movie Board","movies_board.php"));
$arr->append(new Breadcrumb("Add Movie","add_movie.php"));


draw_breadcrumb($arr);
?>

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
            Add a Movie
        </h3>
        
    </div>
</section>

<section class="container">
    <div class="d-flex justify-content-center ">
        
        <form class="col-10 col-lg-7 border border-10  bg-white rounded-2 pl-3 action" action="groups_list.php" method="post">

            <div class="row">

                <div class= "col">
                    <label for="groupName" class="form-label mt-3 ">Movie Name</label>
                    <input type="text" class="col-7 form-control border border-1rounded-1 " id="groupName" aria-describedby="groupName">
                </div>

                <div class= "col">
                    <label for="year" class="form-label mt-3 ">Year</label>
                    <input type="text" class="col-7 form-control border border-1rounded-1 " id="year" aria-describedby="year">
                </div>
                
                
            </div>
            
            <label for="groupName" class="form-label mt-3 ">Movie Description</label>
            <textarea type="text" rows="3" class="row-4 form-control border border-1rounded-1 " id="groupName" aria-describedby="groupName"></textarea>

            <label class="form-label mt-3" for="customFile">Upload Movie Poster</label>
            <input type="file" class="form-control" id="customFile" />

         

            <div class="row mt-3">

                <div class="col d-flex  ">
                    <input class="btn btn-outline-secondary mt-3 mb-3 " type="button" value="Cancel">
                </div>

                <div class="col d-flex justify-content-end ">
                    <input class="btn btn-outline-secondary mt-3 mb-3 " type="submit" value="Add">
                </div>
                
                
            </div>
            

        </form>
        
        
        
    </div>
</section>


<?php
draw_footer();