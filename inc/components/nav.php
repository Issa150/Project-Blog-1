<?php
    if(isset($_GET['logout'])){
        unset($_SESSION['current_user']);
        header("Location: " . SITE_PATH);
    }

?>

<nav>
    <div class="container">

        <h2>Logo</h2>
        <ul class="responsive-nav">
            <li><a href="<?=SITE_PATH?>" class="active">Home</a></li>
            <li>
                <a href="#">Products<i class="fa-solid fa-angle-down"></i></a>
                <ul>
                    <div>
                        <li><a href="<?= SITE_PATH ?>pages/profile.php"><i class="fa-regular fa-user"></i> Profile</a></li>
                        <li><a href=""><i class="fa-regular fa-heart"></i> Favorites</a></li>
                        <li><a href="<?= SITE_PATH ?>profile.php?acount_setting"><i class="fa-solid fa-id-card"></i> Account setting</a></li>
                        <li><a href="?logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </div>
                </ul>
            </li>
            <li><a href="#">Blog<i class="fa-solid fa-angle-down"></i></a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">About us</a></li>
        </ul>


        <ul class="connection">
            <!-- PHP scripts for showing the user profile -->
            <?php if(isset($_SESSION['current_user'])) { ?>
            <li>
                <a href='<?=SITE_PATH?>pages/account.php'>
                    <img src="<?= SITE_PATH . "assets/imgs/profile/" . ($_SESSION['current_user'] ? $_SESSION['current_user']['image'] : "placeholder-general-img.png")?>" alt="Profile image holder">
                    <span><?=ucfirst($_SESSION['current_user']['username'])?></span>
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
            <?php }else{?>

            <li><a href='<?=SITE_PATH?>pages/connection/login.php'>Login</a></li>
            <li><a href='<?=SITE_PATH?>pages/connection/signup.php'>sign up</a></li>
            
        <?php } ?>
        </ul>

        <i class="fa-solid fa-bars hamburger_menu" id="hamburger_menu"></i>
    </div>
</nav>