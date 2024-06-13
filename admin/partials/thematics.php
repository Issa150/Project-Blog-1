<?php
// include_once "../classes/Posts.php";
// $thematics = new Thematic();


// Ajouter une nouvelle article
// if (!empty($_POST)) {
    // $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
    // $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
    // $user_id = $_SESSION['current_user']['id'];

    // $thematics->insertThematic($title, $description);
// }

$allThematics = $thematics->getAll();

?>
<!-- <div class="head-info">
    <a href="?posts">All authors <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All categories <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All thematics <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All tags <i class="fa-solid fa-filter"></i></a>

</div> -->

<div class="body-info">
    <!-- ------------------ -->
    <div class="control_bar">
        <?php if ($_SESSION['current_user']['role'] == "owner") { ?>
            <!-- <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button> -->
            <a href="<?= SITE_PATH ?>admin/dashboard.php?add_theme" class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></a>
        <?php } ?>

        <!-- <div id="modal"> -->

            
        <!-- </div> -->
        <div class="meta-statistic">

            <dl>
                <dt>Total: </dt>
                <dd><?= count($allThematics)  ?></dd>
            </dl>
            <?php if ($_SESSION['current_user']['role'] != "owner") { ?>
                <span class="alert-msg">The themes are selected to align with the website's policies and objectives, ensuring content consistency</span>
            <?php } ?>
        </div>
    </div>

    <div class="posts_container">

        
        <!-- // -->

        <div class="table table-thematics">
            <div class="grid-row">
                <div class="header">Title</div>
                <div class="header">Description</div>
                <div class="header">Total</div>
            </div>
            <?php if (count($allThematics) == 0) { ?>
                <p class="empty">No categories created yet 🫤</p>

                <?php } else {
                foreach ($allThematics as $thematic) { ?>
                    <div class="grid-row">
                        <!-- Action btns -->
                        <div class="btns-container">
                            <a href="<?= SITE_PATH ?>admin/dashboard.php?update_theme=<?= $thematic['id'] ?>" class="btn btn-link success">Modifier</a>
                            <a href="<?= SITE_PATH ?>admin/dashboard.php?delete_theme=<?= $thematic['id'] ?>" class="btn btn-link delete">Suprimer</a>
                        </div>
                        <!-- Cells -->
                        <div class="grid-cell">
                            <?= (strlen($thematic['title']) > 40) ? substr($thematic['title'], 0, 40) . '...' : $thematic['title'] ?>
                        </div>

                        <div class="grid-cell">
                            <?= $thematic['description'] ?>
                        </div>

                        <div class="grid-cell">
                            <?= $general_class->counter('posts', 'thematic_id', $thematic['id'], $_SESSION['current_user']['id'])["COUNT(*)"] ?>
                        </div>

                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>