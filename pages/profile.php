<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/GetUsers.php";
include_once "../classes/Update_user_info.php";

///////////::



$title = "profile";
include_once "../inc/header.html.php";
include_once "../inc/components/nav.php";
/////////////////////////////////////////  //

// ************  Login check  ************//
if (!isset($_SESSION['current_user'])) {
    header("Location: " . SITE_PATH . "pages/connection/login.php");
}

?>



<main class="container">
    <aside>
        <h1>User profile</h1>
        <ul>
            <li><a class="<?= (isset($_GET['user_info']) || empty($_GET)) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/profile.php?user_info"><i class="fa-solid fa-user-pen"></i>User info</a></li>
            <li><a class="<?= isset($_GET['favorite']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/profile.php?favorite"><i class="fa-regular fa-heart"></i>Favorites</a></li>
            <li><a class="<?= isset($_GET['watchlist']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/profile.php?watchlist"><i class="fa-regular fa-star"></i>WatchList</a></li>
            <li><a class="<?= isset($_GET['acount_setting']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/profile.php?acount_setting"><i class="fa-solid fa-id-card"></i>Account setting</a></li>
        </ul>
    </aside>

    <!-- -------------------------- -->
    
    <div class="info-detail">
        <?php
        if (isset($_GET['user_info']) || empty($_GET)) {
            include_once  "partials/profile_user.php";
        } elseif (isset($_GET['favorite'])) {
            include_once  "partials/favorites_user.php";
        } elseif (isset($_GET['watchlist'])) {
            include_once  "partials/watchlist_user.php";
        } elseif (isset($_GET['acount_setting'])) {
            include_once  "partials/acount_setting.php";
        }
        ?>
    </div>

</main>










<?php include_once "../inc/footer.html.php";
