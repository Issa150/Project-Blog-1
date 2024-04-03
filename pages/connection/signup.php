<?php
include_once "../../controllers/connection/signup.controller.php";

$title = "signup";
include_once "../../inc/header.html.php"
?>

<form action="" method="post" id="signupForm">
    <h2>Create your account</h2>
    <div class="body">


        <fieldset class="multi_wrap_input">

            <div class="input_error_wrapper">

                <div class="input-clone">
                    <i class="fa-solid fa-user"></i>

                    <div class="single_wrap_input">
                        <input type="text" placeholder="First name" name="firstName">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                </div>

                <?php echo $firstNameErr ? "<p class='error-message'>$firstNameErr</p>" : "";?>
            </div>

            <div class="input_error_wrapper">
                <div class="input-clone">
                    <i class="fa-solid fa-user"></i>
                    <div class="single_wrap_input">
                        <input type="text" placeholder="Last name" name="lastName">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                </div>
                <?php echo $lastNameErr ? "<p class='error-message' style='font-size: .94rem;'>$lastNameErr</p>" : "";; ?>
            </div>
        </fieldset>

        <div class="input_error_wrapper">
            <div class="input-clone">
                <i class="fa-solid fa-id-badge"></i>
                <div class="single_wrap_input">
                    <input type="text" name="username" placeholder="Choose a username">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
            </div>
            <?php echo $usernameErr ? "<p class='error-message'>$usernameErr</p>" : "";
            ?>
        </div>

        <div class="input_error_wrapper">
            <div class="input-clone">
                <i class="fa-solid fa-envelope"></i>
                <div class="single_wrap_input">
                    <input type="email" name="email" id="email" placeholder="Email address">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
            </div>
            <?php echo $emailErr ? "<p class='error-message'>$emailErr</p>" : "";
            ?>
        </div>

        <div class="input_error_wrapper">
            <div class="input-clone">
                <i class="fa-solid fa-lock"></i>
                <div class="single_wrap_input">
                    <input type="password" name="password" id="password" placeholder="Choose a password at least 5 characters">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="showPassword" id="showPassword"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <?php echo $passwordErr ? "<p class='error-message'>$passwordErr</p>" : "";
            ?>
        </div>

        <div class="input_error_wrapper">
            <div class="input-clone">
                <i class="fa-solid fa-lock"></i>
                <div class="single_wrap_input">
                    <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Please repeate your password">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span class="showPassword" id="showPasswordRepeat"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <?php echo $passwordRepeatErr ? "<p class='error-message'>$passwordRepeatErr</p>" : "";
            ?>
        </div>

        <button type="submit">Sign up</button>
        <br>
        <a href="login.php">You have already an account?😃</a>
    </div>
</form>

<?php
include_once "../../inc/footer.html.php"; ?>