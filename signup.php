<?php
include_once 'config/function.php';

// Error variables
$firstNameErr = "";
$lastNameErr = "";
$usernameErr = "";
$emailErr = "";
$passwordErr = "";
$passwordRepeatErr = "";

$welcome = "";

if(!empty($_POST)) {

    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = strtolower(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $passwordRepeat = filter_input(INPUT_POST, 'passwordRepeat', FILTER_SANITIZE_SPECIAL_CHARS);
    $verifyTicket = true;


// echo$firstName,$lastName,$username,$email,$password,$passwordRepeat;
    
    if (empty($firstName)) {
        $firstNameErr = "<p>This field can not be empty.</p>";
        
        $verifyTicket = false;
    }

    if (empty($lastName)) {
        $lastNameErr = "<p>This field can not be empty.</p>";
        $verifyTicket = false;
    }

    if (empty($username)) {
        $usernameErr = "<p>This field can not be empty.</p>";
        $verifyTicket = false;
    } elseif (strlen($username) < 5) {
        $usernameErr = "<p>The value must be at least 5 characters!</p>";
        $verifyTicket = false;
    }

    if (empty($email)) {
        $emailErr = "<p>This field can not be empty.</p>";
        $verifyTicket = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "<p>Invalid email format.</p>";
        $verifyTicket = false;
    }

    if (empty($password)) {
        $passwordErr = "<p>This field can not be empty.</p>";
        $verifyTicket = false;
    } elseif (strlen($password) < 8) {
        $passwordErr = "<p>The value must be at least 8 characters!</p>";
        $verifyTicket = false;
    }

    if (empty($passwordRepeat)) {
        $passwordRepeatErr = "<p>This field can not be empty.</p>";
        $verifyTicket = false;
    } elseif ($password !== $passwordRepeat) {
        $passwordRepeatErr = "<p>Passwords do not match.</p>";
        $verifyTicket = false;
    }

    // if ($verifyTicket) {
    //     // Code to create a new user account
    // }
}

$title = "signup";
include_once "inc/header.html.php"
?>

<form action="" method="post">
    <h2>Create your account</h2>
    <div class="multi_wrap_input">
        <div class="input_error_wrapper">
            <div class="single_wrap_input">
                <input type="text" placeholder="First name" name="firstName">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <?php  echo $firstNameErr ? "<p>$firstNameErr</p>" : "" ?>
        </div>

        <div class="input_error_wrapper">
            <div class="single_wrap_input">
                <input type="text" placeholder="Last name" name="lastName">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <?php echo $lastNameErr ? "<p>$lastNameErr</p>" : ""?>
        </div>
    </div>

    <div class="input_error_wrapper">
        <div class="single_wrap_input">
            <input type="text" name="username" placeholder="Choose a username">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <?php echo $usernameErr ? "<p>$usernameErr</p>" : "" ?>
    </div>

    <div class="input_error_wrapper">
        <div class="single_wrap_input">
            <input type="email" name="email" id="email" placeholder="Email address">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <?php echo $emailErr ? "<p>$emailErr</p>" : "" ?>
    </div>

    <div class="input_error_wrapper">
        <div class="single_wrap_input">
            <input type="password" name="password" id="password" placeholder="Choose a password at least 8 characters">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span class="showPassword" id="showPassword"><i class="fa-solid fa-eye"></i></span>
        </div>
        <?php echo $passwordErr ? "<p>$passwordErr</p>" : "" ?>
    </div>

    <div class="input_error_wrapper">
        <div class="single_wrap_input">
            <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Please repeate your password">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span class="showPassword" id="showPasswordRepeat"><i class="fa-solid fa-eye"></i></span>
        </div>
        <?php echo $passwordRepeatErr ? "<p>$passwordRepeatErr</p>" : "" ?>
    </div>

    <button type="submit">Sign up</button>
</form>

<?php include_once "inc/footer.html.php" ?>