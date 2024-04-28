<?php

$getUsers = new getUsers();
$getUser = $getUsers->getSingle('users', "id", $_SESSION['current_user']['id']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
    // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $verifyTicket = true;


    if (empty($firstName)) {
        $firstNameErr = "First name is required!.";
        $verifyTicket = false;
    } else {
        if (strlen($firstName) <= 2) {
            $firstNameErr = "First name must be at least 2 characters";
            $verifyTicket = false;
        } elseif (preg_match('/\d/', $firstName)) {
            $firstNameErr = "No numbers are allowed in the first name field.";
            $verifyTicket = false;
        }
    }

    if (empty($lastName)) {
        $lastNameErr = "Family name is required!.";
        $verifyTicket = false;
    } else {
        if (strlen($lastName < 3)) {
            $lastNameErr = "Last name must contain more than 3 characters.";
            $verifyTicket = false;
        } elseif (preg_match('/\d/', $lastName)) {
            $firstNameErr = "No numbers are allowed in the last name field.";
            $verifyTicket = false;
        }
    }

    if (empty($username)) {
        $usernameErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($username) < 5) {
        $usernameErr = "The value must be at least 5 characters!";
        $verifyTicket = false;
    }

    if (empty($email)) {
        $emailErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        $verifyTicket = false;
    }



    if ($verifyTicket) {

        $updateUserInfo = new updateUserInfo();
        $updateUserInfo->updateUser(
            $firstName,
            $lastName,
            $username,
            $email,
            $city,
            $country,
            $gender,
            $_SESSION['current_user']['id']
        );
        $getUser = $getUsers->getSingle('users', "id", $_SESSION['current_user']['id']);
    }
}
?>

<div class="head-info">
    <?php if (isset($_SESSION["current_user"])) { ?>
        <div>
            <img src="<?= SITE_PATH . "assets/imgs/profile/" . ($getUser['image']) ?>" alt="Image placeholder">
            <i class="fa-solid fa-pen-to-square"></i>
        </div>

        <div class="user-info">
            <h3><?= ucfirst($getUser['name']) . " " . strtoupper($getUser['lastName']) ?></h3>
            <span><?= $getUser['city'] ?>,</span>
            <span><?= $getUser['country'] ?></span>
        </div>

    <?php  } else { ?>

        <img title="Please login" src="<?= SITE_PATH ?>assets/imgs/profile/placeholder-general-img.png" alt="Image placeholder">
        <div class="user-info" title="Please login">
            <h3>Unknown user</h3>
            <span>...</span>
            <span> ...</span>
        </div>

    <?php  } ?>

</div>

<div class="body-info">
    <div action="" method="" class="formOff">

        <fieldset class="grid-col-3">
            <label for="first_name">Name</label>
            <input readonly="true" type="text" name="first_name" id="first_name" value="<?= $getUser['name'] ?>">
            
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="last_name">Family Name</label>
            <input readonly="true" type="text" name="last_name" id="last_name" value="<?= $getUser['lastName'] ?>">
            
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="username">User Name</label>
            <input readonly="true" type="text" name="username" id="username" value="<?= $getUser['username'] ?>">
            
        </fieldset>

        <fieldset>
            <label for="email">Email address</label>
            <input readonly="true" type="text" name="email" id="email" value="<?= $getUser['email'] ?>">
        </fieldset>

        <!-- <fieldset>
            <label for="password">Set new password</label>
            <input readonly="true" type="text" name="password" id="password">
            <?php //echo isset($passwordErr) ? "<p class='error-message'>$passwordErr</p>" : "dfqsdgqsrgq"; 
            ?>
        </fieldset> -->

        <fieldset>
            <label for="gender">Gender</label>
            <ul>
                <li><input disabled  <?= ($getUser['gender'] == "male") ? "checked" : "" ?> type="radio" name="gender" value="male" id="male"> Male</li>
                <li><input disabled  <?= ($getUser['gender'] == "female") ? "checked" : "" ?> type="radio" name="gender" value="female" id="male"> Female</li>
                <li><input disabled  <?= ($getUser['gender'] == "nb") ? "checked" : "" ?> type="radio" name="gender" value="nb" id="male"> no-binairy</li>

            </ul>
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="city">City </label>
            <input readonly="true" type="text" name="city" id="city" value="<?= $getUser['city'] ?>">
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="country">country</label>
            <input readonly="true" type="text" name="country" id="country" value="<?= $getUser['country'] ?>">
        </fieldset>
        <div class="grid-full-width">
            <button href="?modify" id="openDialog">Make changes</button>
        </div>
    </div>
    <!--  ----------------------------------------------->
    <!--      Pop up  form     -->
    <dialog id="myModal">


        <form action="" method="post" id="editProfileform">

            <fieldset class="grid-col-3">
                <label for="first_name">Name</label>
                <input type="text" name="first_name" id="first_name" value="<?= $getUser['name'] ?>">
                <?php echo isset($firstNameErr) ? "<p class='error-message'>$firstNameErr</p>" : "dfqsdgqsrgq"; ?>
            </fieldset>

            <fieldset class="grid-col-3">
                <label for="last_name">Family Name</label>
                <input type="text" name="last_name" id="last_name" value="<?= $getUser['lastName'] ?>">
                <?php echo isset($lastNameErr) ? "<p class='error-message'>$lastNameErr</p>" : "dfqsdgqsrgq"; ?>
            </fieldset>

            <fieldset class="grid-col-3">
                <label for="username">User Name</label>
                <input type="text" name="username" id="username" value="<?= $getUser['username'] ?>">
                <?php echo isset($usernameErr) ? "<p class='error-message'>$usernameErr</p>" : "dfqsdgqsrgq"; ?>
            </fieldset>

            <fieldset>
                <label for="email">Email address</label>
                <input type="text" name="email" id="email" value="<?= $getUser['email'] ?>">
                <?php echo isset($emailErr) ? "<p class='error-message'>$emailErr</p>" : "dfqsdgqsrgq"; ?>
            </fieldset>

            <!-- <fieldset>
            <label for="password">Set new password</label>
            <input type="text" name="password" id="password">
            <?php //echo isset($passwordErr) ? "<p class='error-message'>$passwordErr</p>" : "dfqsdgqsrgq"; 
            ?>
            </fieldset> -->

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
        </form>
    </dialog>
</div>