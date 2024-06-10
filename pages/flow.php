<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";

///////////::
include_once "../classes/Posts_class.php";


$title = "flow";
include_once "../inc/header.html.php";
include_once "../inc/components/nav.php";
/////////////////////////////////////////  //

// ************  Login check  ************//
// *** this page is open for all people to navigate and just see the contents
// if (!isset($_SESSION['current_user'])) {
//     header("Location: " . SITE_PATH . "pages/connection/login.php");
// }
$postsClass = new Posts();
if(isset($_GET['all'])){
    $id_thematic = $_GET['all'];
    $postFlow = $postsClass->getAllJoin($id_thematic, 'ORDER BY id DESC');
}
?>
<main>
    <section class="container">
        <div class="title-tool">
            <h2>Recent blog <?php 
            if($id_thematic == 1){
                echo 'tutorials';
            }elseif($id_thematic == 2){
                echo 'tips';
            } ?></h2>
        </div>
        <div class="posts-row">

            <?php if (isset($_GET['all'])) {


                foreach ($postFlow as $post) { ?>
                    <a href="<?= SITE_PATH ?>pages/post.php?id=<?= $post['id']?>">
                        <figure class="card-main">
                            <img loading="lazy" src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="<?= $post['image_cover']?>">
                            <figcaption>
                                <h3><?= (strlen(htmlspecialchars_decode($post['title'])) > 33) ? substr(htmlspecialchars_decode($post['title']), 0, 33). '...' : htmlspecialchars_decode($post['title']) ?></h3>
                                <p><?= (strlen(htmlspecialchars_decode($post['body'])) > 160) ? substr(htmlspecialchars_decode($post['body']), 0, 160). '...' : htmlspecialchars_decode($post['body']) ?></p>
                                
                                <div class="meta-info-container">
                                    <img loading="lazy" src="<?= !empty($post['author_image']) ? SITE_PATH . "assets/imgs/profile/"  . $post['author_image'] : SITE_PATH . "assets/imgs/profile/placeholder-general-img.png" ?>" alt="<?= $post['author_image']?>">
                                    <p><?= $post['author'] ?></p>
                                    <p><?=  date('d-m-Y', strtotime($post['created_at'])) ?></p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
            <?php }
            } ?>


        </div>

    </section>

</main>

<?php include_once "../inc/footer.html.php";
