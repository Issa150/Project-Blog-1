<?php
// include_once "../classes/Posts_class.php";

// $thematics = new Thematic();
// $categories = new Categorie();



// Ajouter une nouvelle article




// Afficher Toutes les articles
$allPosts = $posts->getPostInfosOffice($_SESSION['current_user']['id']);
// dump($allPosts);
// die;
// Aficher les categories fait par Cette Utilisateur
$allCategories = $categories->getAllMyCategories($_SESSION['current_user']['id']);

?>
<div class="head-info">
    <a href="?posts">All authors <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All categories <i class="fa-solid fa-filter"></i></a>
    <a href="?posts">All thematics <i class="fa-solid fa-filter"></i></a>
    <!-- <a href="?posts">All tags <i class="fa-solid fa-filter"></i></a> -->

</div>

<div class="body-info">
    <!-- ----------- -->
    <div class="control_bar">
        <button class="btn openDialog" id="open-modal">Create new <i class="fa-regular fa-square-plus"></i></button>

        <div id="modal">

            <form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
                <h2>Add new post</h2>

                <fieldset class="grid-col-6">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="">
                </fieldset>

                <fieldset class="grid-col-6">
                    <label for="mytextarea">Body:</label>
                    <!-- <textarea name="body" id="body" cols="30" rows="10"></textarea> -->
                    <textarea name="body" id="mytextarea" placeholder="Description..." cols="30" rows="10"></textarea>

                </fieldset>

                <fieldset class="grid-col-6">
                    <label for="post_cover">
                        <i class="fa-solid fa-photo-film"></i>
                        Image cover
                        <input type="file" name="post_cover" id="post_image_banner">
                    </label>
                </fieldset>

                <fieldset class="grid-col-3">
                    <label for="draft"> Thematics: <span>Required*</span></label>
                    <div class="input">
                        <?php foreach ($thematics->getAll() as $thematic) : ?>
                            <div>
                                <input type="radio" name="thematic" value="<?= $thematic['id'] ?>" id="draft"> <?= $thematic['title'] ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </fieldset>

                <fieldset class="grid-col-3">
                    <label for="draft"> Categories</label>
                    <div class="input">
                        <?php
                        if (count($allCategories) == 0) { ?>

                            <p class="empty">No categories created yet 🫤</p>
                            <a class="guiding btn" href="<?= SITE_PATH ?>admin/dashboard.php?categories">Add a new category</a>


                            <?php } else {
                            foreach ($allCategories as $categorie) { ?>
                                <div>
                                    <input type="checkbox" name="category" value="<?= $categorie['id'] ?>" id="draft"> <?= $categorie['title'] ?>
                                </div>
                        <?php  }
                        } ?>
                    </div>
                </fieldset>

                <fieldset class="grid-col-6">
                    <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Save it as draft</label>
                    <input type="radio" name="draft" value="0" id="draft">
                </fieldset>

                <div class="grid-full-width">
                    <button id="cancelModal" formmethod="dialog">Cancel</button>
                    <!-- <button type="submit">Publish</button> -->
                    <input class="btn btn-success" type="submit" name="formType" value="Publish the post">
                </div>

            </form>
        </div>
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

        <table>
            <thead>
                <tr>
                    <th class="post-title">Title</th>
                    <th>Author</th>
                    <th>Thematics</th>
                    <th>Category</th>
                    <!-- <th>Tags</th> -->
                    <th>Dates</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($allPosts as $post) : ?>
                    <tr>
                        <!-- <td class="button-container"><span class="button-wrapper"><a href="">Modifier</a> <a href=""><i class="fa-solid fa-pen-to-square"></i></a></span></td> -->
                        <!-- <div><td class="button-container"><span class="button-wrapper"><a href="">Modifier</a> <a href=""><i class="fa-solid fa-pen-to-square"></i></a></span></td></div> -->
                        <td><?= (strlen($post['title']) > 40) ? substr($post['title'], 0, 40) . '...' : $post['title'] ?></td>
                        <td><?= $post['author'] ?></td>
                        <td><?= $post['thematic'] ?></td>
                        <td class="small"><?= !empty($post['categories']) ? $post['categories'] : "<span class='no-choice'>No category!</span>" ?></td>
                        <!-- <td><? //= htmlspecialchars_decode($post['body']) 
                                    ?></td> -->
                        <td class="small"><?= date('d-m-Y', strtotime($post['created_at'])) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>