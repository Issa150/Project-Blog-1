<?php
include_once "../../inc/process/login.process.php";


$title = "login";
include_once "../../inc/header.html.php";
?>

<form autocomplete="off" action="" method="post">
    <h2>Welcome to login page</h2>
    <div class="body">
        <div class="input_error_wrapper">

            <div class="input-clone">
                <i class="fa-solid fa-user"></i>

                <div class="single_wrap_input">
                    <input value="issa2024" autocomplete="off" type="text" name="username" placeholder="Username">
                </div>
            </div>
            <?php echo $usernameErr ? "<p class='error-message'>$usernameErr</p>" : ""; ?>
        </div>

        <div class="input_error_wrapper">
            <div class="input-clone">
                <i class="fa-solid fa-lock"></i>
                <div class="single_wrap_input">
                    <input value="Issa2024" autocomplete="off" type="password" name="password" placeholder="Password">
                    <span class="showPassword" id="showPassword"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <?php echo $passwordErr ? "<p class='error-message'>$passwordErr</p>" : "";?>
        </div>
        <button type="submit">Login</button>
        <br>
        <?= $welcome ?? ""?>
        <a href="signup.php">Create a new account😍</a>
    </div>
</form>



<?php
include_once "../../inc/footer.html.php" ?>