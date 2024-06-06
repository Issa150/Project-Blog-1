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
            <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button>
        <?php } ?>

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
                    <!-- <button type="submit">Publish</button> -->
                    <input class="btn btn-success" type="submit" name="formType" value="Publish the theme">
                </div>

            </form>
        </div>
        <div class="meta-statistic">

            <dl>
                <dt>Total: </dt>
                <dd><?= count($allThematics)  ?></dd>
            </dl>
            <?php if ($_SESSION['current_user']['role'] != "owner") { ?>
                <span>The themes are selected to align with the website's policies and objectives, ensuring content consistency</span>
            <?php } ?>
        </div>
    </div>

    <div class="posts_container">

        <table>
            <thead>
                <tr>
                    <th class="post-title">Title</th>
                    <th>Description</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($allThematics as $thematic) : ?>
                    <tr>
                        <td><?= $thematic['title'] ?></td>
                        <td><?= $thematic['description'] ?></td>
                        <td><?= $general_class->counter('posts', 'thematic_id', $thematic['id'], $_SESSION['current_user']['id'])["COUNT(*)"]; ?></td>
                        <!-- <td><? //= date('Y-m-d', strtotime($post['created_at'])) 
                                    ?></td> -->
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>