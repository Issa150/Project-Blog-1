<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/GetUsers.php";
include_once "../classes/Update_user_info.php";

///////////::
include_once "../inc/process/profile_user.process.php";



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
            <li><a class="<?= (isset($_GET['profile']) || empty($_GET)) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/account.php?profile"><i class="fa-solid fa-house-chimney-user"></i>Profile</a></li>
            <li><a class="<?= (isset($_GET['user_info']) || empty($_GET)) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/account.php?user_info"><i class="fa-solid fa-user-pen"></i>User info</a></li>
            <li><a class="<?= isset($_GET['favorite']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/account.php?favorite"><i class="fa-solid fa-people-line"></i>Follows</a></li>
            <li><a class="<?= isset($_GET['watchlist']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/account.php?watchlist"><i class="fa-solid fa-bookmark"></i>Saved</a></li>
            <li><a class="<?= isset($_GET['watchlist']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/account.php?watchlist"><i class="fa-solid fa-users-rectangle"></i>Groups</a></li>
            <li><a class="<?= isset($_GET['account_setting']) ? "active" : ""?>" href="<?= SITE_PATH ?>pages/account.php?account_setting"><i class="fa-solid fa-id-card"></i>Account setting</a></li>
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
        } elseif (isset($_GET['account_setting'])) {
            include_once  "partials/account_setting.php";
        }elseif (isset($_GET['profile'])) {
            include_once  "partials/profile.php";
        }
        ?>
    </div>

</main>










<?php include_once "../inc/footer.html.php";
