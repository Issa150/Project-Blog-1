<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= isset($metaDescription) ? $metaDescription : "Privet page" ?>">
    <link rel="icon" type="image/x-icon" href="<?= SITE_PATH?>assets/imgs/favicon.png">
    <!-- <base href="<?//=SITE_PATH?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php
    if($title == "signup" || $title == "login"){
        echo "<link rel='stylesheet' href='".SITE_PATH."assets/styles/css/signup-login.css'>";
    }else{
        echo "<link rel='stylesheet' href='".SITE_PATH."assets/styles/css/$title.css'>";
        if($title == 'dashboard'){
            echo "<script src='".SITE_PATH."assets/js/tinymce/tinymce.min.js' referrerpolicy='origin'></script>";
        }
    }
    ?>
    <!-- <title><?//= $title ? $title : "Blog_1"?></title> -->
    <title><?= $metaTitle ? $metaTitle : "IdeaPedia"?></title>
</head>
<body>
    
