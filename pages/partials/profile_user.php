<?php
// unset($_SESSION['current_user']);
?>

<div class="head-info">
    <?php if (isset($_SESSION["current_user"])) { ?>
        <img src="<?= SITE_PATH . "assets/imgs/profile/" . ($_SESSION['current_user']['image']) ?>" alt="Image placeholder">

        <div class="user-info">
            <h3><?= ucfirst($_SESSION['current_user']['name']) . strtoupper($_SESSION['current_user']['lastName']) ?></h3>
            <span><?= $_SESSION['current_user']['city'] ?>,</span>
            <span><?= $_SESSION['current_user']['country'] ?></span>
        </div>

    <?php  } else { ?>

        <img  title="Please login" src="<?= SITE_PATH ?>assets/imgs/profile/placeholder-general-img.png" alt="Image placeholder">
        <div class="user-info"  title="Please login">
            <h3>Unknown user</h3>
            <span>...</span>
            <span> ...</span>
        </div>

    <?php  } ?>

</div>

<div class="body-info">
    <form action="" method="post">

        <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name">
        </fieldset>

        <fieldset>
            <label for="lastName">Family Name</label>
            <input type="text" name="lastName">
        </fieldset>

        <fieldset>
            <label for="email">Email address</label>
            <input type="text" name="email">
        </fieldset>

        <fieldset>
            <label for="phone">Phone  number</label>
            <input type="text" name="phone">
        </fieldset>

        <fieldset>
            <label for="gender">Gender</label>
            <input type="radio" name="gender"  value="male" id="male"> Male
            <input type="radio" name="gender"  value="female" id="male"> Female
            <input type="radio" name="gender"  value="nb" id="male"> no-binairy
        </fieldset>

        <fieldset>
            <label for="city">City </label>
            <input type="text" name="city">
        </fieldset>

        <fieldset>
            <label for="country">country</label>
            <input type="text" name="country">
        </fieldset>
    </form>
</div>