<?php
include_once "main_templates.php";
draw_head();
draw_navbar_normal_user();
$arr =  new ArrayObject();
$arr->append(new Breadcrumb("Home","main_page.php"));
$arr->append(new Breadcrumb("Friends Feed","friends_feed.php"));

draw_breadcrumb($arr);
?>
<div class="feed mt-5">
    <h4 class="display-6 text-center">Friends Reviews Feed</h4>
    <?php
        draw_review_1();
        draw_review_2();
        ?>
</div>
<?php
draw_footer();