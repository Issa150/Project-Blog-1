<?php
include_once "../classes/Posts_class.php";
$postsClass = new Posts();
$postsTutorials = $postsClass->getAllpostOfUser($_SESSION['current_user']['id'],1);
$postsTips = $postsClass->getAllpostOfUser($_SESSION['current_user']['id'],2);
?>
<section>
    <div class="title-tool">
        <h2>My tutorials:</h2>
        <!-- <a href="<?php //= SITE_PATH 
                        ?>pages/flow.php?all=tutorials">See all</a> -->
    </div>
    <div class="posts-row profile">
        <?php 
        if(count($postsTutorials) == 0){
            echo "<p>No Post made in type of tutorial yet!</p>";
        }else{
        foreach ($postsTutorials as $post) { ?>
            <a href="<?= SITE_PATH ?>pages/post.php?id=<?= $post['id']?>">
            
            <figure class="card-main">
            <img loading="lazy" src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="<?= $post['image_cover']?>">
                <figcaption>
                    <h3><?= (strlen(htmlspecialchars_decode($post['title'])) > 33) ? substr(htmlspecialchars_decode($post['title']), 0, 33). '...' : htmlspecialchars_decode($post['title']) ?></h3>
                    <p><?= (strlen(htmlspecialchars_decode($post['body'])) > 40) ? substr(htmlspecialchars_decode($post['body']), 0, 40). '...' : htmlspecialchars_decode($post['body']) ?></p></p>
                    <div class="meta-info-container">
                        <img loading="lazy" src="<?= !empty($post['author_image']) ? SITE_PATH . "assets/imgs/profile/"  . $post['author_image'] : SITE_PATH . "assets/imgs/profile/placeholder-general-img.png" ?>" alt="<?= $post['author_image']?>">
                        <p><?=$post['author'] ?></p>
                        <p><?=  date('d-m-Y', strtotime($post['created_at'])) ?></p>
                    </div>
                </figcaption>
            </figure>
            </a>
        <?php }} ?>
    </div>
</section>
<!-- -------------------------------------------------------------------------- -->
<section>
    <div class="title-tool">
        <h2>My tips...</h2>
        <!-- <a href="<?php //= SITE_PATH 
                        ?>pages/flow.php?all=tips">See all</a> -->
    </div>
    <div class="posts-row container-list">
        <?php 
        if(count($postsTips) == 0){
            echo "<p>No Post made in type of tips yet!</p>";
        }else{
            foreach ($postsTips as $post) { ?>
            <a href="<?= SITE_PATH ?>pages/post.php?id=<?= $post['id']?>">
                <figure class="card-side-content">
                <img loading="lazy" src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="<?= $post['image_cover']?>">
                    <figcaption>
                        <h3><?= (strlen(htmlspecialchars_decode($post['title'])) > 33) ? substr(htmlspecialchars_decode($post['title']), 0, 33). '...' : htmlspecialchars_decode($post['title']) ?></h3>
                        <p><?= (strlen(htmlspecialchars_decode($post['body'])) > 40) ? substr(htmlspecialchars_decode($post['body']), 0, 40). '...' : htmlspecialchars_decode($post['body']) ?></p></p>
                        <div class="meta-info-container">
                        <img loading="lazy" src="<?= !empty($post['author_image']) ? SITE_PATH . "assets/imgs/profile/"  . $post['author_image'] : SITE_PATH . "assets/imgs/profile/placeholder-general-img.png" ?>" alt="<?= $post['author_image']?>">
                        <p><?=$post['author'] ?></p>
                        <p><?=  date('d-m-Y', strtotime($post['created_at'])) ?></p>
                        </div>
                    </figcaption>
                </figure>
            </a>

        <?php }} ?>



    </div>
</section>