<?php

function draw_aside(){ ?>
<aside id="user_info" class="col-xl-2 col-lg-2 col-12 fixed d-flex flex-column">
    <a class="btn btn-primary mt-3" href="moves_board.php">
        <h4 class="">Movies</h4>
    </a>
    <button class="btn btn-primary mt-3" disabled>
        <h4 class="">Reported</h4>
    </button>
    <a class="btn btn-primary mt-3" href="users_board.php">
        <h4 class="">Users</h4>
    </a>
</aside>
<?php
}