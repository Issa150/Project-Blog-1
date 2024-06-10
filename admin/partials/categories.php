<?php
// include_once "../classes/Posts.php";
// $categories = new Categorie();


// Ajouter une nouvelle article
// if (!empty($_POST)) {
//     $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
//     $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
//     $user_id = $_SESSION['current_user']['id'];

//     $categories->insertCategorie($title, $description, $user_id);
// }

$allCategories = $categories->getAllMyCategories($_SESSION['current_user']['id']);

?>
<!-- <div class="head-info">
    <a href="?posts">All authors <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All categories <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All thematics <i class="fa-solid fa-filter"></i></a>
     <a href="?posts">All tags <i class="fa-solid fa-filter"></i></a>

</div> -->

<div class="body-info">

    <div class="control_bar">
        <!-- <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button> -->
        <a href="<?= SITE_PATH ?>admin/dashboard.php?add_category" class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></a>

        <!-- <div id="modal"> -->


        <!-- </div> -->
        <div class="meta-statistic">

            <dl>
                <dt>Total: </dt>
                <dd><?= count($allCategories)  ?></dd>
            </dl>
        </div>
    </div>

    <div class="posts_container">

        <div class="table table-categories">
            <div class="grid-row">
                <div class="header">Title</div>
                <div class="header">Author</div>
                <div class="header">Total</div>
            </div>
            <?php if (count($allCategories) == 0) { ?>
                <p class="empty">No categories created yet 🫤</p>

                <?php } else {
                foreach ($allCategories as $categorie) { ?>
                    <div class="grid-row">
                        <!-- Action btns -->
                        <div class="btns-container">
                            <a href="<?= SITE_PATH ?>admin/dashboard.php?update_category=<?= $categorie['id'] ?>" class="btn btn-link success">Modifier</a>
                            <a href="<?= SITE_PATH ?>admin/dashboard.php?delete_category=<?= $categorie['id'] ?>" class="btn btn-link delete">Suprimer</a>
                        </div>
                        <!-- Cells -->
                        <div class="grid-cell">
                            <?= (strlen($categorie['title']) > 40) ? substr($categorie['title'], 0, 40) . '...' : $categorie['title'] ?>
                        </div>

                        <div class="grid-cell">
                            <?= $categorie['name'] ?>
                        </div>

                        <div class="grid-cell">
                            <?= $general_class->counterJoin_3($categorie['id'], $_SESSION['current_user']['id'])["total"]; ?>
                        </div>

                    </div>
            <?php }
            } ?>
        </div>

    </div>
</div>