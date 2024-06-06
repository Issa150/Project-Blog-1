<?php
if (isset($_GET['logout'])) {
    unset($_SESSION['current_user']);
    header("Location: " . SITE_PATH);
}

?>

<nav>
    <div class="container">

        <a href="<?= SITE_PATH ?>"><h2 class="logo">IdeaPedia</h2></a>
        <!-- <img class="logo" src="<?//= SITE_PATH ?>assets/imgs/Logo.png" alt=""> -->
        <ul class="responsive-nav">
            <li><a href="<?= SITE_PATH ?>" class="active">Home</a></li>
            <li>
                <a href="#">Type of articles<i class="fa-solid fa-angle-down"></i></a>
                <ul>
                    <div>
                        <li><a href="<?= SITE_PATH ?>pages/profile.php"> Tutorials</a></li>
                        <li><a href=""> Lists</a></li>
                    </div>
                </ul>
            </li>
            <li>
                <a href="#">Categories<i class="fa-solid fa-angle-down"></i></a>
                <ul>
                    <div>
                        <li><a href="">Santé</a></li>
                        <li><a href="">Développement personnel</a></li>
                        <li><a href="">Finances</a></li>
                        <li><a href="">Carrière et emploi</a></li>
                        <li><a href="">Éducation et formation</a></li>
                        <li><a href="">Voyages et tourisme</a></li>
                        <li><a href="">Technologie et informatique</a></li>
                        <li><a href="">Environnement et durabilité</a></li>
                        <li><a href="">Culture et loisirs</a></li>
                        <li><a href="">Bien-être et qualité de vie</a></li>
                    </div>
                </ul>
            </li>
        </ul>


        <ul class="connection">
            <!-- PHP scripts for showing the user profile -->
            <?php if (isset($_SESSION['current_user'])) { ?>
                <li>
                    <a href='#'>
                        <img src="<?= SITE_PATH . "assets/imgs/profile/" . (!empty($_SESSION['current_user']['image']) ? $_SESSION['current_user']['image'] : "placeholder-general-img.png") ?>" alt="Profile image holder">
                        <span><?= ucfirst($_SESSION['current_user']['username']) ?></span>
                    </a>
                    <ul>
                        <div>
                            <li><a href="<?= SITE_PATH ?>pages/account.php?user_info"><i class="fa-regular fa-user"></i> Profile</a></li>
                            <li><a href="<?= SITE_PATH ?>admin/dashboard.php"><i class="fa-solid fa-briefcase"></i> Backoffice</a></li>
                            <li><a href=""><i class="fa-regular fa-heart"></i> Favorites</a></li>
                            <li><a href="<?= SITE_PATH ?>pages/account.php?account_setting"><i class="fa-solid fa-id-card"></i>Account setting</a></li>
                            <li><a href="?logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </div>
                    </ul>
                </li>
            <?php } else { ?>

                <li><a href='<?= SITE_PATH ?>pages/connection/login.php'>Login</a></li>
                <li><a href='<?= SITE_PATH ?>pages/connection/signup.php'>sign up</a></li>

            <?php } ?>
        </ul>

        <i class="fa-solid fa-bars hamburger_menu" id="hamburger_menu"></i>
    </div>
</nav>