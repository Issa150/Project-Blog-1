<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";

///////////::



$title = "section";
include_once "../inc/header.html.php";
include_once "../inc/components/nav.php";
/////////////////////////////////////////  //

// ************  Login check  ************//
if (!isset($_SESSION['current_user'])) {
    header("Location: " . SITE_PATH . "pages/connection/login.php");
}

?>
<main>
    <section class="container">
        <div class="title-tool">
            <h2>Recent blog posts</h2>
        </div>
        <div class="posts-row">

            <?php if (isset($_GET['all'])) {


                $i = 0;
                while ($i < 9) { ?>
                    <figure>
                        <img src="../assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                        <figcaption>
                            <h3>Building you API stack</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi, aliquam quis culpa quod earum molestiae! Corporis beatae laboriosam suscipit nesciunt illum autem optio a nostrum.</p>
                            <div class="meta-info-container">
                                <img src="../assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                                <p>Lana steinler</p>
                                <p>18 Jan 2024</p>
                            </div>
                        </figcaption>
                    </figure>
            <?php
                    $i++;
                }
            } ?>


        </div>

    </section>