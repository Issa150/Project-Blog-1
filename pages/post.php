<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/Posts_class.php";
$postClassvar = new Posts();
// when good content exist, remove this initiation from DB🔽
$post = $postClassvar->getSingle(5);
///////////::



$title = "post";
include_once "../inc/header.html.php";
include_once "../inc/components/nav.php";
/////////////////////////////////////////  //

// ************  Login check  ************//
// *** this page is open for all people to navigate and just see the contents


if (isset($_SESSION['id'])) {
    $id = $_GET['id'];
    $post = $postClassvar->getSingle($id);
}

?>

<main>
    <section class="container">


        <article>
            <img src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="">
            <div class="meta-info-container">
                <img src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/profile/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/profile/placeholder-man-img.jpg" ?>" alt="Profile-author">
                <p><?= $post['username'] ?></p>
                <i class="fa-solid fa-bookmark"></i>
            </div>
            <h1><?= $post['title'] ?></h1>
            <p><?= htmlspecialchars_decode($post['body']) ?></p>
        </article>

        <aside>
            <h4>Monthly archive:</h4>
            <div class="months-wrapper">

                <?php for ($x = 1; $x <= 6; $x++) { ?>
                    <p class="monthes-archive">January</p>
                <?php } ?>
            </div>

        </aside>

    </section>
</main>





<?php include_once "../inc/footer.html.php";
