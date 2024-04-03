<nav>
    <div class="container">

        <h2>Logo</h2>
        <ul class="responsive-nav">
            <li><a href="<?=SITE_PATH?>" class="active">Home</a></li>
            <li><a href="#">Products<i class="fa-solid fa-angle-down"></i></a></li>
            <li><a href="#">Blog<i class="fa-solid fa-angle-down"></i></a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">About us</a></li>
        </ul>


        <ul class="connection">
        <?php if(isset($_SESSION['current_user'])) { ?>

            <li>
                <a href='pages/profile.php'>
                    <img src="<?= SITE_PATH . "assets/imgs/profile/" . ($_SESSION['current_user'] ? $_SESSION['current_user']['image'] : "placeholder-general-img.png")?>" alt="Profile image holder">
                    <span><?=ucfirst($_SESSION['current_user']['username'])?></span>
                </a>
            </li>

        <?php }else{?>

            <li><a href='<?=SITE_PATH?>pages/connection/login.php'>Login</a></li>
            <li><a href='<?=SITE_PATH?>pages/connection/signup.php'>sign up</a></li>
            
        <?php } ?>
        </ul>

        <i class="fa-solid fa-bars my_menu" id="my_menu"></i>
    </div>
</nav>