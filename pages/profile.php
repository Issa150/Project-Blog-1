<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";



$title = "profile";
include_once "../inc/header.html.php";
include_once "../inc/nav.php";
/////////////////////////////////////////  //

// if(!isset($_SESSION['current_user'])){
//     header('Location: '. SITE_PATH ."pages/connection/login.php");
// }

?>



<main class="container">
    <aside>
        <h1>User profile</h1>
        <ul>
            <li class="active"><a href="profile.php?user_info"><i class="fa-solid fa-user-pen"></i>User info</a></li>
            <li><a href="profile.php?favorite"><i class="fa-regular fa-heart"></i>Favorites</a></li>
            <li><a href="profile.php?watchlist"><i class="fa-regular fa-star"></i>WatchList</a></li>
            <!-- <li><a href="profile.php?setting">Setting</a></li> -->
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
        }
        ?>
    </div>

</main>










<?php include_once "../inc/footer.html.php";
