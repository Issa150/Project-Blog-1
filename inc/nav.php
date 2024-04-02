<nav>
    <div class="container">

        <h2>Logo</h2>
        <ul class="responsive-nav active">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="#">Products<i class="fa-solid fa-angle-down"></i></a></li>
            <li><a href="#">Blog<i class="fa-solid fa-angle-down"></i></a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">About us</a></li>
        </ul>


        <ul class="connection">
        <?php if(isset($_SESSION['current_user'])) { ?>

            <li><a href='pages/connection/login.php'><img src="assets/imgs/profile/placeholder-general-img.png" alt=""><span><?=ucfirst($_SESSION['current_user']['username'])?></span></a></li>
            <!-- <li><a href='pages/connection/signup.php'></a></li> -->

        <?php } else{?>

            <li><a href='pages/connection/login.php'>Login</a></li>
            <li><a href='pages/connection/signup.php'>sign up</a></li>
            
        <?php } ?>
        </ul>

        <i class="fa-solid fa-bars my_menu" id="my_menu"></i>
    </div>
</nav>