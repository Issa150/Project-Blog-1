<?php
include_once "../../inc/session_security.php";
include_once '../../inc/function.php';
include_once "../../classes/GetUsers.php";




///////////////////////////////////////
// Error variables
$usernameErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $verifyTicket = true;


    if (empty($username)) {
        $usernameErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($username) < 5) {
        $usernameErr = "the value must be at least 5 characters!";
        $verifyTicket = false;
    }


    if (empty($password)) {
        $passwordErr = "This field can not be empty.";
        $verifyTicket = false;
    } elseif (strlen($password) < 5) {
        $passwordErr = "the value must be at least 8 characters!";
        $verifyTicket = false;
    }

    
    ///////////////////////////////////////
    // Verification et creation de compte

    if ($verifyTicket) {
        
        $getuser = new GetUsers();
        $user = $getuser->getSingleUser( $username);

        // If user is found in the database
        if ($user != null) {


            // Checking for correct password 
            if (password_verify($password,$user["password"])) {
                unset($user[ "password" ]);
                $_SESSION['current_user'] = $user;
                
                header('Location: '. SITE_PATH . 'index.php');
            } else {
                $passwordErr = "Password is incorrect.";
            }
        } else {
            $usernameErr = "The username does not exist.";
        }
    }
}

