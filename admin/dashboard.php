<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/GetUsers.php";
include_once "../classes/Update_user_info.php";
include_once "../classes/Posts_class.php";
include_once "../classes/Thematics_class.php";
include_once "../classes/Categories_class.php";
include_once "../classes/General_class.php";


//********* : instentiaions  : ***********
$general_class = new Genreal();
$posts = new Posts();
$thematics = new Thematic();
$categories = new Categorie();

//********* : Submit Proccess : ***********
if (!empty($_POST)) {
    if ($_POST['formType'] == 'Publish the post') {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $body = trim(filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS));
        $thematic_id = trim(filter_input(INPUT_POST, "thematic", FILTER_SANITIZE_SPECIAL_CHARS));
        $category_id = isset($_POST['category']) ? trim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS)) : null;
        $published = (isset($_POST['draft'])) ? 0 : 1;
        $image_cover = isset($_FILES['post_cover']['name']) ? $_FILES['post_cover']['name'] : null;
        $user_id = $_SESSION['current_user']['id'];


        $posts->addPostJoin($user_id, $title, $body, $image_cover, $published, $thematic_id, $category_id);
        if (!empty($_FILES['post_cover'])) {
            // $posts->insertSingleFile($image_cover);
            move_uploaded_file($_FILES['post_cover']['tmp_name'], SITE_PATH . "assets/imgs/posts/" . $_FILES['post_image_banner']['name']);
        }

        header('Location:' . SITE_PATH . 'admin/dashboard.php?posts');
    } elseif ($_POST['formType'] == 'Publish the theme') {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $user_id = $_SESSION['current_user']['id'];

        $thematics->insertThematic($title, $description);
        header('Location:' . SITE_PATH . 'admin/dashboard.php?thematics');
    } elseif ($_POST['formType'] == 'Publish the category') {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $user_id = $_SESSION['current_user']['id'];

        $categories->insertCategorie($title, $description, $user_id);
        header('Location:' . SITE_PATH . 'admin/dashboard.php?categories');
    }
}
//*********  :: END Proccess  : ***********

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
    <!-- <img src="../assets/imgs/initials/pawel-czerwinski-7FqOISWr5V0-unsplash.jpg" alt=""> -->
    <img src="<?= SITE_PATH . "assets/imgs/banner/" . (!empty($_SESSION['current_user']['profile_cover']) ? $_SESSION['current_user']['profile_cover'] : "initial-banner.jpg") ?>" alt="">
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
            <li><a class="<?= (isset($_GET['posts']) || empty($_GET)) ? "active" : "" ?>" href="<?= SITE_PATH ?>admin/dashboard.php?posts"><i class="fa-regular fa-newspaper"></i>Posts</a></li>
            <li><a class="<?= isset($_GET['thematics']) ? "active" : "" ?>" href="<?= SITE_PATH ?>admin/dashboard.php?thematics"><i class="fa-solid fa-layer-group"></i>Themes</a></li>
            <li><a class="<?= isset($_GET['categories']) ? "active" : "" ?>" href="<?= SITE_PATH ?>admin/dashboard.php?categories"><i class="fa-solid fa-rectangle-list"></i>Categories</a></li>
            <!-- <li><a class="<? //= isset($_GET['account_setting']) ? "active" : "" 
                                ?>" href="<? //= SITE_PATH 
                                            ?>pages/dashboard.php.php?account_setting"><i class="fa-solid fa-tags"></i>Tags</a></li> -->
        </ul>
    </aside>

    <div class="info-detail">
        <!-- <div class="head-info">
            <a href="?posts">All authors <i class="fa-solid fa-filter"></i></a>
            <a href="?posts">All categories <i class="fa-solid fa-filter"></i></a>
            <a href="?posts">All thematics <i class="fa-solid fa-filter"></i></a>
             <a href="?posts">All tags <i class="fa-solid fa-filter"></i></a> -->

        <!--</div>

        <div class="body-info"> -->
        <?php
        if (isset($_GET['posts']) || empty($_GET)) {
            include_once  "partials/posts.php";
        } elseif (isset($_GET['thematics'])) {
            include_once  "partials/thematics.php";
        } elseif (isset($_GET['categories'])) {
            include_once  "partials/categories.php";
        }
        ?>

        <!-- </div> -->
    </div>
</main>







<?php include_once "../inc/footer.html.php";
