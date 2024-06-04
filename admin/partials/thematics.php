<?php
// include_once "../classes/Posts.php";
$thematics = new Thematic();


// Ajouter une nouvelle article
if (!empty($_POST)) {
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
    $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
    $user_id = $_SESSION['current_user']['id'];

    $thematics->insertThematic($title,$description);
}

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
        <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button>

        <div id="modal">

            <form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
                <h2>Add new Thematic</h2>
                <fieldset class="grid-col-6">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="">
                </fieldset>

                <fieldset class="grid-col-6">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" value="">
                </fieldset>
                
                <div class="grid-full-width">
                    <button id="cancelModal" formmethod="dialog">Cancel</button>
                    <button type="submit">Publish</button>
                </div>

            </form>
        </div>
        <div class="meta-statistic">

            <dl>
                <dt>Total: </dt>
                <dd><?= count($allThematics)  ?></dd>
            </dl>
        </div>
    </div>

    <div class="posts_container">

        <table>
            <thead>
                <tr>
                    <th class="post-title">Title</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($allThematics as $post) : ?>
                    <tr>
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['description'] ?></td>
                        <!-- <td><? //= date('Y-m-d', strtotime($post['created_at'])) 
                                    ?></td> -->
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>