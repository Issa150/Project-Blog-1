<?php
include_once "inc/session_security.php";
include_once "inc/function.php";
include_once "controllers/index.controller.php";



$title = "home";
include_once "inc/header.html.php";
include_once "inc/nav.php";
?>

<header>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/imgs/jason-briscoe-GrdJp16CPk8-unsplash.jpg" alt="a woman cooking in the kitchen.">
                <div class="content">
                    <div class="container">
                        <h3>Mastering the Art of Homemade Pasta</h3>
                        <p>Discover the joy of crafting your own fresh pasta from scratch. Learn essential techniques, from kneading the dough to shaping delicate ravioli.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>

        <div class="autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>

    <!-- Swiper JS -->
</header>


<main>
    <section class="container">
        <h2>Recent blog posts</h2>
        <div class="posts">
            <article>
                <figure>
                    <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                    <figcaption>
                        <h3>Building you API stack</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi, aliquam quis culpa quod earum molestiae! Corporis beatae laboriosam suscipit nesciunt illum autem optio a nostrum.</p>
                        <div class="meta-info-container">
                            <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                            <p>Lana steinler</p>
                            <p>18 Jan 2024</p>
                        </div>
                    </figcaption>
                </figure>
            </article>
        </div>
        <button>Load more</button>
    </section>
</main>



<?php include_once "inc/footer.html.php"; ?>