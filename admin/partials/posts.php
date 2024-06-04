<?php
// include_once "../classes/Posts_class.php";
$posts = new Posts();
$thematics = new Thematic();
$categories = new Categorie();

// Ajouter une nouvelle article
if (!empty($_POST)) {
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));
    $body = trim(filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS));
    $published = (isset($_POST['draft'])) ? 0 : 1;
    $image_cover = isset($_FILES['post_image_banner']['name']) ? $_FILES['post_image_banner']['name'] : null;
    $user_id = $_SESSION['current_user']['id'];


    $post->insertPost($title, $body, $user_id, $image_cover, $published);
    if (!empty($_FILES['post_image_banner'])) {
        $posts->insertSingleFile($image_cover);
        move_uploaded_file($_FILES['post_image_banner']['tmp_name'], SITE_PATH . "assets/posts/" . $_FILES['post_image_banner']['name']);
    }
}

// Update
// if()

// Afficher Toutes les articles
$allPosts = $posts->getPostInfosOffice($_SESSION['current_user']['id']);

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
        <!-- <dialog id="myModal"> -->
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

                <fieldset class="grid-col-3">
                    <label for="post_image_banner">
                        <i class="fa-solid fa-photo-film"></i>
                        Image cover
                        <input type="file" name="postCover" id="post_image_banner">
                    </label>
                </fieldset>

                <fieldset class="grid-col-3">
                    <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Thematics: <sup>Required*</sup></label>
                    <?php foreach($thematics as $thematic):?>
                    <input type="radio" name="themathic" value="<?= $thematic['name']?>" id="draft"> <?= $thematic['name']?>
                    <?php endforeach?>
                </fieldset>

                <fieldset class="grid-col-3">
                    <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Thematics: <sup>Required*</sup></label>
                    <?php foreach($categories as $categorie):?>
                    <input type="radio" name="themathic" value="<?= $categorie['name']?>" id="draft"> <?= $categorie['name']?>
                    <?php endforeach?>
                </fieldset>

                <fieldset class="grid-col-3">
                    <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Save it as draft</label>
                    <input type="radio" name="draft" value="0" id="draft">
                </fieldset>

                <div class="grid-full-width">
                    <button id="cancelModal" formmethod="dialog">Cancel</button>
                    <button type="submit">Publish</button>
                </div>

            </form>
        </div>
        <!-- </dialog> -->
        <div class="meta-statistic">
            <!-- <dl>
            <dt>Published: </dt>
            <dd><? //= '2'  
                ?></dd>
        </dl>
        <dl>
            <dt>Draft: </dt>
            <dd><? //= '2' 
                ?></dd>
        </dl> -->

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
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['author'] ?></td>
                        <td><?= $post['thematic'] ?></td>
                        <td><?= $post['category'] ?></td>
                        <!-- <td><? //= '$post[tags]' 
                                    ?></td> -->
                        <td><?= date('Y-m-d', strtotime($post['created_at'])) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?php
        // dump($allPosts);
        //foreach ($allPosts as $post) : 
        ?>
        <article>
            <!-- <figure>
                 adding image placeholder  -->
            <!-- <img src="<? //= SITE_PATH . 'assets/imgs/' 
                            ?><? //= !empty($post['image_cover']) ? $post['image_cover'] : "initials/placeholder.png" 
                                ?>" alt="Post image">
                <figcaption>
                    <h3><? //= $post['title'] 
                        ?></h3>
                    <p><? //= $post['body'] 
                        ?></p>
                    <div class="meta-info-container">
                        <img src="<? //= SITE_PATH 
                                    ?>assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <div class="meta-info-author_date">
                            <p>User id : <? //= $post['user_id'] 
                                            ?></p>
                            <p><? //= $post['created_at'] 
                                ?></p>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </article> -->
            <?php //endforeach 
            ?>
            <!-- End of fEtching Posts -->
    </div>
</div>