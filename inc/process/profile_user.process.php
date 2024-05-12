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
    $profileImg = $_FILES['profile-img']['name'];
    $profileCover = $_FILES['profile-cover']['name'];
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
        if(!empty($profileImg)){
            $getUsers->updateSingleFile("image", $profileImg, $_SESSION["current_user"]['id']);
            move_uploaded_file($_FILES['profile-img']['tmp_name'], '../assets/imgs/profile/' . $profileImg);
        }

        if(!empty($profileCover)){
            $getUsers->updateSingleFile("profile_cover",$profileCover, $_SESSION["current_user"]['id']);
            move_uploaded_file($_FILES['profile-cover']['tmp_name'], '../assets/imgs/banner/' . $profileCover);
        }

        $getUser = $getUsers->getSingle('users', "id", $_SESSION['current_user']['id']);
        //updateing the $_SESSION
        unset($_SESSION["current_user"]);
        $_SESSION["current_user"]= $getUser;
        
    }
    //redirection insted of Using link
    header("Location:" . SITE_PATH ."pages/account.php");
}
// dump($_SESSION["current_user"]);
?>