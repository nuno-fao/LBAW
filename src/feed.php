<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Feed","#"));

draw_breadcrumb($arr);
?>
<div class="d-flex me-auto justify-content-center mt-0 sticky-top bg-light" style="top:84px; z-index:9">
    <div class="mx-1" id="btn-public">
        <button class="btn btn-secondary rounded-0">
            Public Feed
        </button>
        <div class="pt-1 bg-primary"></div>
    </div>
    <div class="mx-1" id="btn-friends">
        <button class="btn btn-secondary rounded-0">
            Friends Feed
        </button>
        <div class="pt-1 bg-secondary"></div>
    </div>
</div>
<div class="feed mt-5" id="public_feed">
    <h4 class="display-6 text-center">Public Reviews Feed</h4>
    <?php
        draw_review_1();
        draw_review_2();
        ?>
</div>
<div class="feed mt-5" id="friends_feed" style="display:none">
    <h4 class="display-6 text-center">Friends Reviews Feed</h4>
    <?php
        draw_review_1();
        draw_review_2();
        ?>
</div>
<?php
draw_footer();