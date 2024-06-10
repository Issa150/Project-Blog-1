<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/GetUsers.php";
include_once "../classes/Update_user_info.php";
include_once "../classes/Posts_class.php";
include_once "../classes/Thematics_class.php";
include_once "../classes/Categories_class.php";
include_once "../classes/General_class.php";

// ************  Login check  ************//
if (!isset($_SESSION['current_user'])) {
    header("Location: " . SITE_PATH . "pages/connection/login.php");
}
/////////////////////////////////////////  //

//********* : instentiaions for paritals : ***********
$general_class = new Genreal();
$posts = new Posts();
$thematics = new Thematic();
$categories = new Categorie();

// ********* data eccessible for partials  ***********
$allCategories = $categories->getAllMyCategories($_SESSION['current_user']['id']);
// dump($allCategories);

//********* : Submit Proccess : ***********
// post error handler
$postErr = $thematicErr = $categoryErr = $generalErr = "";

//------------------------------------------------------------------
//------------------------------------------------------------------
// ****** All form proccesses are done here, because all forms are included in this file down below.  *********
if (!empty($_POST)) {
    if ($_POST['formType'] == 'Publish the post') {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $body = trim(filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS));
        if (isset($_POST['thematic'])) {
            $thematic_id = trim(filter_input(INPUT_POST, "thematic", FILTER_SANITIZE_SPECIAL_CHARS));
        } else {
            $thematic_id = ''; // or some other default value
        }
        // $thematic_id = trim(filter_input(INPUT_POST, "thematic", FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($thematic_id)) {
            $thematicErr = "Please select a thematic";
        }
        if (empty($title)) {
            $postErr = "Title of a post is required!";
        } elseif (strlen($title) > 250) {
            $postErr = "Title Is limited to 250 characters!";
        }
        $category_ids = isset($_POST['category']) ? $_POST['category'] : [];
        $published = (isset($_POST['draft'])) ? 0 : 1;
        $image_cover = isset($_FILES['post_cover']['name']) ? $_FILES['post_cover']['name'] : null;
        $user_id = $_SESSION['current_user']['id'];

        // dump($category_ids);

        if (empty($thematicErr) && empty($postErr)) {
            $posts->addPostJoin($user_id, $title, $body, $image_cover, $published, $thematic_id, $category_ids);
            if (isset($image_cover)) {
                move_uploaded_file($_FILES['post_cover']['tmp_name'], "../assets/imgs/posts/" . $image_cover);
            }
            header('Location:' . SITE_PATH . 'admin/dashboard.php?posts');
        }
    } elseif ($_POST['formType'] == 'Publish the theme') {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $user_id = $_SESSION['current_user']['id'];
        if (empty($title)) {
            $thematicErr = "Title of a 'type of post' is required!";
        } elseif (strlen($title) > 250) {
            $postErr = "Title Is limited to 250 characters!";
        }

        if (empty($thematicErr) && empty($postErr)) {
            $thematics->insertThematic($title, $description, $user_id);
            header('Location:' . SITE_PATH . 'admin/dashboard.php?thematics');
        }
    } elseif ($_POST['formType'] == 'Publish the category') {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $user_id = $_SESSION['current_user']['id'];
        if (empty($title)) {
            $categoryErr = "Title for category is required!";
        } elseif (strlen($title) > 250) {
            $postErr = "Title Is limited to 250 characters!";
        }
        if (empty($thematicErr) && empty($postErr)) {
            $categories->insertCategorie($title, $description, $user_id);
            header('Location:' . SITE_PATH . 'admin/dashboard.php?categories');
        }
    }
    // **********   Update forms  ******************
    elseif ($_POST['formType'] == 'Update the post') {
        // $id = $_POST['post_id'];
        $id_post = $_GET['update_post'];
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $body = trim(filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS));
        $thematic_id = trim(filter_input(INPUT_POST, "thematic", FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($thematic_id)) {
            $thematicErr = "Please select a thematic";
        }
        if (empty($title)) {
            $postErr = "Title of a post is required!";
        }elseif (strlen($title) > 250) {
            $postErr = "Title Is limited to 250 characters!";
        }
        $category_ids = isset($_POST['category']) ? $_POST['category'] : [];
        $published = (isset($_POST['draft'])) ? 0 : 1;
        $image_cover = isset($_FILES['post_cover']['name']) ? $_FILES['post_cover']['name'] : null;
        $user_id = $_SESSION['current_user']['id'];

        if (empty($thematicErr) && empty($postErr)) {
            // $posts->updatePostOfficeJoin($id_post, $user_id, $title, $body, $image_cover, $published, $thematic_id, $category_ids);
            $posts->updatePostJoin($id_post, $user_id, $title, $body, $image_cover, $published, $thematic_id, $category_ids);
            if (isset($image_cover)) {
                move_uploaded_file($_FILES['post_cover']['tmp_name'], "../assets/imgs/posts/" . $image_cover);
            }
            header('Location:' . SITE_PATH . 'admin/dashboard.php?posts');
        }
    } elseif ($_POST['formType'] == 'Update the category') {
        // $id = $_POST['post_id'];
        $id_category = $_GET['update_category'];
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $user_id = $_SESSION['current_user']['id'];
        if (empty($title)) {
            $categoryErr = "Title for category is required!";
        }elseif (strlen($title) > 250) {
            $postErr = "Title Is limited to 250 characters!";
        }

        if (empty($categoryErr)&& empty($postErr)) {
            $categories->updateCategorie($id_category, $title, $description, $user_id);
            header('Location:' . SITE_PATH . 'admin/dashboard.php?categories');
        }
    } elseif ($_POST['formType'] == 'Update the theme') {
        $id_thematic = $_GET['update_theme'];
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $user_id = $_SESSION['current_user']['id'];

        if (empty($title)) {
            $thematicErr = "Title of a 'type of post' is required!";
        }elseif (strlen($title) > 250) {
            $postErr = "Title Is limited to 250 characters!";
        }
        if (empty($thematicErr) && empty($postErr)) {
            $thematics->updateThematic($id_thematic, $title, $description, $user_id);
            header('Location:' . SITE_PATH . 'admin/dashboard.php?thematics');
        }
    }
}
// ***** Submition and deletion is diffenetivelly apart and not at the same time, so it is better do make ti run or being ignored on execution.
elseif (!empty($_GET)) {
    // *** checking the associated delete :
    if (isset($_GET['delete_post'])) {
        $id_post = $_GET['delete_post'];
        $posts->deletePost($id_post);
        header('Location:' . SITE_PATH . 'admin/dashboard.php?posts');
    } elseif (isset($_GET['delete_theme'])) {
        $id_theme = $_GET['delete_theme'];
        $thematics->deleteThematic($id_theme);
        header('Location:' . SITE_PATH . 'admin/dashboard.php?thematics');
    } elseif (isset($_GET['delete_category'])) {
        $id_category  = $_GET['delete_category'];
        $categories->deleteCategorie($id_category);
        header('Location:' . SITE_PATH . 'admin/dashboard.php?categories');
    }
}

//*********  :: END Proccess  : ***********

$title = "dashboard";
include_once "../inc/header.html.php";


?>






<header>
    <?php include_once "../inc/components/nav.php"; ?>
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
            <h4>Insights</h4>
            <li><a class="<?= (isset($_GET['posts']) || empty($_GET)) ? "active" : "" ?>" href="<?= SITE_PATH ?>admin/dashboard.php?posts"><i class="fa-regular fa-newspaper"></i>Posts</a></li>
            <li><a class="<?= isset($_GET['thematics']) ? "active" : "" ?>" href="<?= SITE_PATH ?>admin/dashboard.php?thematics"><i class="fa-solid fa-layer-group"></i>Themes</a></li>
            <li><a class="<?= isset($_GET['categories']) ? "active" : "" ?>" href="<?= SITE_PATH ?>admin/dashboard.php?categories"><i class="fa-solid fa-rectangle-list"></i>Categories</a></li>

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
        } elseif (isset($_GET['update_post']) || isset($_GET['add_post'])) {
            include_once  "partials/forms/add_update_post.php";
        } elseif (isset($_GET['update_theme']) || isset($_GET['add_theme'])) {
            include_once  "partials/forms/add_update_theme.php";
        } elseif (isset($_GET['update_category']) || isset($_GET['add_category'])) {
            include_once  "partials/forms/add_update_category.php";
        }
        ?>

        <!-- </div> -->
    </div>
</main>







<?php include_once "../inc/footer.html.php";
