<?php
include_once "../classes/Posts.php";

if(!empty($_POST)){
    $title = $_POST['title'];
    $body = $_POST['body'];

    if(isset($_POST['draft'])){
        echo "DRAFT";
    }else{
        echo "Submition";
    }

}

?>

<button class="btn" id="openDialog">Create new <i class="fa-regular fa-square-plus"></i></button>
<dialog id="myModal">

    <form action="" method="post" id="editProfileform">
        <h2>Add new post</h2>
        <fieldset class="grid-col-6">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?//= $getUser['title'] ?>">

        </fieldset>
        <fieldset class="grid-col-6">
            <label for="body">Body:</label>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
            
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Save it as draft</label>
            <input type="checkbox" name="draft" value="f"  id="draft">
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="post_image_banner"><i class="fa-solid fa-photo-film"></i> Image cover</label>
            <input type="file" name="post_image_banner" id="post_image_banner">
        </fieldset>

        <div class="grid-full-width">
            <button id="cancelModal" formmethod="dialog">Cancel</button>
            <button type="submit">Publish</button>
        </div>

    </form>
</dialog>