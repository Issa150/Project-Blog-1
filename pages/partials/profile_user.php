<?php
include_once "../inc/process/profile_user.process.php";

?>
<form action="" method="post" id="editProfileform" enctype="multipart/form-data">
    <div class="head-info">

        <label for="profile-cover">
            <img src="<?= SITE_PATH . "assets/imgs/banner/" . (!empty($getUser['profile_cover']) ? $getUser['profile_cover'] : "initial-banner.jpg") ?>" alt="">

        </label>

        <div class="profile-img">
            <label for="profile-img">
                <img class="btn-modal" src="<?= SITE_PATH . "assets/imgs/profile/" . (!empty($_SESSION["current_user"]['image']) ? $_SESSION["current_user"]['image'] :  "placeholder-general-img.png") ?>" alt="Image placeholder">
                <i class="fa-solid fa-pen-to-square btn-modal"></i>
            </label>
        </div>

        <div class="user-info">
            <h3>
                <?= !empty($getUser['name']) ? ucfirst($getUser['name']) . " " : "Unknown user";
                echo  " " . !empty($getUser['lastName']) ? strtoupper($getUser['lastName']) : "..."
                ?>
            </h3>
            <span><?= !empty($getUser['city']) ? $getUser['city'] : "..."
                    ?>,</span>
            <span><?= !empty($getUser['country']) ? $getUser['country'] : "..."
                    ?></span>
        </div>

    </div>

    <div class="body-info">


        <fieldset class="grid-col-3">
            <label for="profile-img">
                <?= !empty($getUser['image']) ? 'Choose a new profile:' : "Choose a profile picture:" ?>
                <!-- <img src="<? //= !empty($getUser['image']) ? SITE_PATH . "assets/imgs/profile/" . $getUser['image'] :  SITE_PATH . "assets/imgs/profile/placeholder-general-img.png" 
                                ?>" alt=""> -->
            </label>
            <input type="file" name="profile-img" id="profile-img">

        </fieldset>

        <fieldset class="grid-col-3">
            <label for="profile-cover">
                <?= !empty($getUser['profile_cover']) ? 'Choose a new profile cover:' : "Choose a profile cover:" ?>
            </label>
            <input type="file" name="profile-cover" id="profile-cover">
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="first_name">Name</label>
            <input type="text" name="first_name" id="first_name" value="<?= $getUser['name'] ?>">
            <?php echo isset($firstNameErr) ? "<p class='error-message'>$firstNameErr</p>" : ""; ?>
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="last_name">Family Name</label>
            <input type="text" name="last_name" id="last_name" value="<?= $getUser['lastName'] ?>">
            <?php echo isset($lastNameErr) ? "<p class='error-message'>$lastNameErr</p>" : ""; ?>
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" value="<?= $getUser['username'] ?>">
            <?php echo isset($usernameErr) ? "<p class='error-message'>$usernameErr</p>" : ""; ?>
        </fieldset>

        <fieldset>
            <label for="email">Email address</label>
            <input type="text" name="email" id="email" value="<?= $getUser['email'] ?>">
            <?php echo isset($emailErr) ? "<p class='error-message'>$emailErr</p>" : ""; ?>
        </fieldset>

        <fieldset>
            <label for="gender">Gender</label>
            <ul>
                <li><input <?= ($getUser['gender'] == "male") ? "checked" : "" ?> type="radio" name="gender" value="male" id="male"> Male</li>
                <li><input <?= ($getUser['gender'] == "female") ? "checked" : "" ?> type="radio" name="gender" value="female" id="male"> Female</li>
                <li><input <?= ($getUser['gender'] == "nb") ? "checked" : "" ?> type="radio" name="gender" value="nb" id="male"> no-binairy</li>

            </ul>
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="city">City </label>
            <input type="text" name="city" id="city" value="<?= $getUser['city'] ?>">
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="country">country</label>
            <input type="text" name="country" id="country" value="<?= $getUser['country'] ?>">
        </fieldset>
        <div class="grid-full-width">
            <button id="cancelModal" formmethod="dialog">Cancel</button>

            <button type="submit">Save changes</button>

        </div>

        <!--  ----------------------------------------------->
        <!--      Pop up  form     -->
        <!-- <dialog id="myModal"> -->

        <!-- </dialog> -->
    </div>
</form>