<?php
// include_once "../classes/Posts_class.php";

// $thematics = new Thematic();
// $categories = new Categorie();



// Ajouter une nouvelle article



// Afficher Toutes les articles
$allPosts = $posts->getAllPostsInfosOffice($_SESSION['current_user']['id']);

// dump($allPosts);
// die;
// Aficher les categories fait par Cette Utilisateur
// $allCategories = $categories->getAllMyCategories($_SESSION['current_user']['id']);

?>
<!-- <div class="head-info">
    <a href="?posts">All authors <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All categories <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All thematics <i class="fa-solid fa-filter"></i></a> -->
    <!-- <a href="?posts">All tags <i class="fa-solid fa-filter"></i></a> -->

<!-- </div> -->

<div class="body-info">
    <!-- ----------- -->
    <div class="control_bar">
        <!-- <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button> -->
        <a href="<?= SITE_PATH ?>admin/dashboard.php?add_post" class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></a>

        
        <div class="meta-statistic">
            <dl>
                <dt>Published: </dt>
                <!-- the counter()[in SQL function count()] returns an arrray, so to acces it => -->
                <dd><?= $general_class->counter('posts', 'published', 1, $_SESSION['current_user']['id'])["COUNT(*)"]; ?></dd>
            </dl>
            <dl>
                <dt>Draft: </dt>
                <!-- the counter()[in SQL function count()] returns an arrray, so to acces it => -->
                <dd><?= $general_class->counter('posts', 'published', 0, $_SESSION['current_user']['id'])["COUNT(*)"]; ?></dd>
            </dl>

            <dl>
                <dt>Total: </dt>
                <dd><?= count($allPosts)  ?></dd>
            </dl>
        </div>
    </div>

    <div class="posts_container">
        
        <!-- ----------------------------- -->
        <div class="table table-posts">
            <div class="grid-row">
                <div class="header">Title</div>
                <div class="header">Author</div>
                <div class="header">Type d'article</div>
                <div class="header">Category</div>
                <div class="header">Dates</div>
            </div>

            <?php foreach ($allPosts as $post) : ?>
                <div class="grid-row">
                    <!-- Action btns -->
                    <div class="btns-container">
                        <a href="<?=SITE_PATH?>admin/dashboard.php?update_post=<?= $post['id']?>" class="btn btn-link success">Modifier</a>
                        <a href="<?= SITE_PATH ?>admin/dashboard.php?delete_post=<?= $post['id']?>" class="btn btn-link delete">Suprimer</a>
                    </div>
                    <!-- Cells -->
                    <div class="grid-cell">
                        <?= (strlen($post['title']) > 40) ? substr($post['title'], 0, 40) . '...' : $post['title'] ?>
                    </div>

                    <div class="grid-cell">
                        <?= $post['author'] ?>
                    </div>

                    <div class="grid-cell">
                        <?= $post['thematic'] ?>
                    </div>

                    <div class="grid-cell">
                        <?= !empty($post['categories']) ? $post['categories'] : "<span class='no-choice'>No category!</span>" ?>
                    </div>

                    <div class="grid-cell">
                        <?= date('d-m-Y', strtotime($post['date'])) ?>
                    </div>

                </div>
            <?php endforeach ?>
        </div>













    </div>
</div>