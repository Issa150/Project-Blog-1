<?php
include_once 'config/function.php';
include_once "classes/GetUsers.php";
$usersStmt = new GetUsers();

// Error variables

$usernameErr = "";
$passwordErr = "";
$usernameLengthErr = "";
$usernameEmptyErr = "";
$passwordLengthErr = "";
$passwordEmptyErr = "";
$welcome = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = strtolower(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $verifyTicket = true;

    if (empty($username)) {
        $usernameEmptyErr = "<p>This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($username) < 5) {
        $usernameLengthErr = "<p>the value must be at least 5 characters!</p>";
        $verifyTicket = false;
    }


    if (empty($password)) {
        $passwordEmptyErr = "<p>This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($password) < 8) {
        $passwordLengthErr = "<p>the value must be at least 8 characters!</p>";
        $verifyTicket = false;
    }


    if ($verifyTicket) {

        $user = $usersStmt->getSingleUser("username", $username);

        // If user is found in the database
        if ($user != null) {


            // Checking for correct password 
            // if (password_verify($password,$user["password"])) {
            if ($password === $user["password"]) {
                $welcome = "Welcome to the dashboard!<br />";
            } else {
                $passwordErr = "Password is incorrect.";
            }
        } else {
            $usernameErr = "<p>The username does not exist.</p>";
        }
    }
}


function errorDisplay($usernameEmptyErr,$usernameLengthErr,$usernameErr){

    if ($usernameEmptyErr || $usernameLengthErr || $usernameErr) {
        echo "<ul class='errorContainer'>";
        echo $usernameEmptyErr ? "<li>$usernameEmptyErr</li>" :  "";
        echo $usernameLengthErr ? "<li>$usernameLengthErr</li>" :  "";
        echo $usernameErr ? "<li>$usernameErr</li>" :  "";

        echo "</ul>";
    }

}

$title = "login";
include_once "inc/header.html.php"
?>

<form action="" method="post">
    <h2>Welcome to login page</h2>
    <input type="text" name="username" placeholder="Username">
    <?php errorDisplay($usernameEmptyErr,$usernameLengthErr,$usernameErr)?>

    <input type="password" name="password" placeholder="Password">
    <?php errorDisplay($passwordEmptyErr,$passwordLengthErr,$passwordErr)?>
    <button type="submit">Login</button>
</form>



<?php include_once "inc/footer.html.php" ?>