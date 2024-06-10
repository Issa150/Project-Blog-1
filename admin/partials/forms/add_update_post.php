<?php
if (isset($_GET['update_post'])) {
    $id_post = $_GET['update_post'];
    $post = $posts->getSinglePostOfficeJoin($id_post);
}
?>

<form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
    <?php
        if (isset($_GET['add_post'])) {
            echo "<h2>Add a new post</h2>";
        } elseif (isset($_GET['update_post'])) {
            echo "<h2>Update the post</h2>";
        }
    ?>
    <p class="alert-msg"><?= $thematicErr ? "please fill all the required fields" : "" ?></p>


    <fieldset class="grid-col-6">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= isset($post['title']) ? $post['title'] : ""; ?>">
        <p class="alert-msg"><?= $postErr ? $postErr : "" ?></p>
    </fieldset>

    <fieldset class="grid-col-6">
        <label for="mytextarea">Body:</label>
        <textarea name="body" id="mytextarea" placeholder="Description..." cols="30" rows="10"> <?= isset($post['body']) ? $post['body'] : ""; ?></textarea>

    </fieldset>

    <fieldset class="grid-col-6">
        <label for="post_cover">
            <span>
                <i class="fa-solid fa-photo-film"></i>
                <?= (!empty($post['image_cover']) && isset($post['image_cover'])) ? $post['image_cover'] : "No Image selected yet!"  ?>
            </span>
            <input type="file" name="post_cover" id="post_image_banner">
        </label>
    </fieldset>

    <fieldset class="grid-col-3">
        <label for="draft"> Thematics: <span class="alert">Required*</span></label>
        <div class="input">
            <?php foreach ($thematics->getAll() as $thematic) : ?>
                <div>
                    <input value="<?= $thematic['id'] ?>" <?= (isset($post['thematic_id']) && $post['thematic_id'] == $thematic['id']) ? "checked" : "" ?> type="radio" name="thematic"> <?= $thematic['title'] ?>
                </div>
            <?php endforeach ?>
            <p class="alert-msg"><?= $thematicErr ? $thematicErr : "" ?></p>
        </div>
    </fieldset>

    <fieldset class="grid-col-3">
        <label for="draft"> Categories</label>
        <div class="input">
            <?php
            if (count($allCategories) == 0) { ?>

                <p class="empty">No categories created yet</p>
                <a class="guiding btn" href="<?= SITE_PATH ?>admin/dashboard.php?categories">Add a new category</a>

                <?php } else {
                if (isset($_GET['update_post'])) {
                    //*** $postCategories = isset($post['categories']) ? explode(',', $post['categories']) : [];
                    //*** the methode above leaves the space before second and rest words which are not good for comparing so we use array_map() to trim & explode
                    $postCategories = array_map('trim', explode(',', $post['categories']));
                    // dump($postCategories);
                }

                foreach ($allCategories as $category) {
                    $isChecked = isset($post) ? in_array($category['title'], $postCategories) : null; ?>

                    <div>
                        <input value="<?php echo $category['id'] ?>" <?php echo $isChecked ? "checked" : "" ?> type="checkbox" name="category[]"> <?php echo $category['title'] ?>
                    </div>

            <?php }
            } ?>
        </div>
    </fieldset>

    <fieldset class="grid-col-6">
        <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Save it as draft</label>
        <input type="radio" name="draft" <?= (isset($post) && $post['published'] == 0) ? "checked" : "" ?> id="draft">
    </fieldset>

    <div class="grid-full-width">
        <a id="cancelModal" href="<?= SITE_PATH ?>admin/dashboard.php?posts" class="btn">Cancel</a>
        <input class="btn btn-success" type="submit" name="formType" value="<?= isset($_GET['add_post']) ? 'Publish the post' : (isset($_GET['update_post']) ? 'Update the post' : '') ?>">
    </div>

</form>