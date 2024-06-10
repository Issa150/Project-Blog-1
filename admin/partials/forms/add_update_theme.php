<?php
if (isset($_GET['update_theme'])) {
    $id_theme = $_GET['update_theme'];
    $theme = $thematics->getSingle($id_theme);
}
?>
<!-- <div id="modal"> -->

<form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
<?php
        if (isset($_GET['add_theme'])) {
            echo "<h2>Add a new post type</h2>";
        } elseif (isset($_GET['update_theme'])) {
            echo "<h2>Update the post type</h2>";
        }
    ?>
    <fieldset class="grid-col-6">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= isset($theme['title']) ? $theme['title'] : ""; ?>">
        <p class="alert-msg"><?= $thematicErr ? $thematicErr : "" ?></p>
        <p class="alert-msg"><?= $postErr ? $postErr : "" ?></p>
    </fieldset>

    <fieldset class="grid-col-6">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?= isset($theme['description']) ? $theme['description'] : ""; ?>">
    </fieldset>

    <div class="grid-full-width">
        <!-- <button id="cancelModal" formmethod="dialog">Cancel</button> -->
        <a id="cancelModal" href="<?= SITE_PATH ?>admin/dashboard.php?thematics" class="btn">Cancel</a>
        <!-- <button type="submit">Publish</button> -->
        <!-- <input class="btn btn-success" type="submit" name="formType" value="Publish the theme"> -->
        <input class="btn btn-success" type="submit" name="formType" value="<?= isset($_GET['add_theme']) ? 'Publish the theme' : (isset($_GET['update_theme']) ? 'Update the theme' : '') ?>">

    </div>

</form>
<!-- </div> -->