<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/GetUsers.php";
include_once "../classes/Update_user_info.php";
include_once "../classes/Posts.php";

///////////::


$title = "dashboard";
include_once "../inc/header.html.php";

/////////////////////////////////////////  //

// ************  Login check  ************//
if (!isset($_SESSION['current_user'])) {
    header("Location: " . SITE_PATH . "pages/connection/login.php");
}
?>






<header>
    <?php include_once "../inc/components/nav.php"; ?>
    <img src="../assets/imgs/initials/pawel-czerwinski-7FqOISWr5V0-unsplash.jpg" alt="">
</header>
<main class="container">

    <aside>

        <img src="<?= SITE_PATH . 'assets/imgs/profile/' . ($_SESSION['current_user'] ? $_SESSION['current_user']['image'] : "placeholder-general-img.png") ?>" alt="">
        <div class="user-info">
            <h3><?= ucfirst($_SESSION['current_user']['name']) . " " . strtoupper($_SESSION['current_user']['lastName']) ?></h3>
            <span><?= $_SESSION['current_user']['city'] ?>,</span>
            <span><?= $_SESSION['current_user']['country'] ?></span>
        </div>
        <ul>
            <li><a class="<?= (isset($_GET['user_info']) || empty($_GET)) ? "active" : "" ?>" href="<?= SITE_PATH ?>pages/account.php?user_info"><i class="fa-regular fa-newspaper"></i>Posts</a></li>
            <li><a class="<?= isset($_GET['favorite']) ? "active" : "" ?>" href="<?= SITE_PATH ?>pages/account.php?favorite"><i class="fa-solid fa-layer-group"></i>Thematics</a></li>
            <li><a class="<?= isset($_GET['watchlist']) ? "active" : "" ?>" href="<?= SITE_PATH ?>pages/account.php?watchlist"><i class="fa-solid fa-rectangle-list"></i>Categories</a></li>
            <li><a class="<?= isset($_GET['account_setting']) ? "active" : "" ?>" href="<?= SITE_PATH ?>pages/account.php?account_setting"><i class="fa-solid fa-tags"></i>Tags</a></li>
        </ul>
    </aside>

    <div class="info-detail">
        <div class="head-info">
            <a href="?posts">All authors <i class="fa-solid fa-filter"></i></a>
            <a href="?posts">All categories <i class="fa-solid fa-filter"></i></a>
            <a href="?posts">All thematics <i class="fa-solid fa-filter"></i></a>
            <a href="?posts">All tags <i class="fa-solid fa-filter"></i></a>

        </div>

        <div class="body-info">
            <?php
            if (isset($_GET['posts']) || empty($_GET)) {
                include_once  "partials/posts.php";
            } elseif (isset($_GET['favorite'])) {
                include_once  "partials/favorites_user.php";
            }
            ?>

        </div>
    </div>
</main>







<?php include_once "../inc/footer.html.php";
