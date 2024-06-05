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
        <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button>

        <div id="modal">

            <form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
                <h2>Add new Categorie</h2>
                <fieldset class="grid-col-6">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title">
                </fieldset>

                <fieldset class="grid-col-6">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description">
                </fieldset>

                <div class="grid-full-width">
                    <button id="cancelModal" formmethod="dialog">Cancel</button>
                    <!-- <button type="submit">Publish</button> -->
                    <input class="btn btn-success" type="submit" name="formType" value="Publish the category">
                </div>

            </form>
        </div>
        <div class="meta-statistic">

            <dl>
                <dt>Total: </dt>
                <dd><?= count($allCategories)  ?></dd>
            </dl>
        </div>
    </div>

    <div class="posts_container">

        <table>
            <thead>
                <tr>
                    <th class="post-title">Title</th>
                    <th>Author</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (count($allCategories) == 0) { ?>
                    <tr>
                        <td colspan="3" class="empty">No categories created yet 🫤</td>
                    </tr>
                    
                    <?php } else {
                    foreach ($allCategories as $categorie) { ?>
                        <tr>
                            <td><?= $categorie['title'] ?></td>
                            <td><?= $categorie['name'] ?></td>
                            <td><?= $general_class->counterJoin_3( $categorie['id'], $_SESSION['current_user']['id'])["total"]; ?></td>
                            
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>