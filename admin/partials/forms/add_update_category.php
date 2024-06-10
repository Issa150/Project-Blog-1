<?php
if (isset($_GET['update_category'])) {
    $id_category = $_GET['update_category'];
    $category = $categories->getSingle($id_category);
}
?>
<!-- <div id="modal"> -->

<form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
    <?php
    if (isset($_GET['add_category'])) {
        echo "<h2>Add a new category</h2>";
    } elseif (isset($_GET['update_category'])) {
        echo "<h2>Update the category</h2>";
    }
    ?>
    <fieldset class="grid-col-6">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= isset($category['title']) ? $category['title'] : ""; ?>">
        <p class="alert-msg"><?= $categoryErr ? $categoryErr : "" ?></p>
        <p class="alert-msg"><?= $postErr ? $postErr : "" ?></p>
    </fieldset>

    <fieldset class="grid-col-6">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?= isset($category['description']) ? $category['description'] : ""; ?>">
    </fieldset>

    <div class="grid-full-width">
        <!-- <button id="cancelModal" formmethod="dialog">Cancel</button> -->
        <a id="cancelModal" href="<?= SITE_PATH ?>admin/dashboard.php?categories" class="btn">Cancel</a>
        <!-- <input class="btn btn-success" type="submit" name="formType" value="Publish the category"> -->
        <input class="btn btn-success" type="submit" name="formType" value="<?= isset($_GET['add_category']) ? 'Publish the category' : (isset($_GET['update_category']) ? 'Update the category' : '') ?>">
    </div>

</form>
<!-- </div> -->