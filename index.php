<?php
include_once "inc/session_security.php";
include_once "inc/function.php";
include_once "inc/process/index.process.php";
// classes:
include_once "classes/Posts_class.php";

$title = "home";
include_once "inc/header.html.php";
include_once "inc/components/nav.php";
// //////////////////////////////////////

$posts = new Posts();
$postSlides = $posts->getAll("LIMIT 5");
?>

<header>
    <?php   ?>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <?php foreach ($postSlides as $post) : ?>
                <div class="swiper-slide">
                    <img src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="a woman cooking in the kitchen.">
                    <div class="content">
                        <div class="container">
                            <h3><?= $post['title'] ?></h3>
                            <p><?= $post['body'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div> -->
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
        <div class="title-tool">
            <h2>My followings recent releases</h2>
            <a href="<?= SITE_PATH?>pages/section.php?all=followings">See all</a>
        </div>
        <div class="posts-row">
            <figure class="card-img-full">
                <img src="assets/imgs/tina-dawson-f1krjnOeWDk-unsplash.jpg" alt="Post follow">
                <figcaption>
                    <h3>Building you API stack</h3>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>
            <figure class="card-img-full">
                <img src="assets/imgs/tina-dawson-f1krjnOeWDk-unsplash.jpg" alt="Post follow">
                <figcaption>
                    <h3>Building you API stack</h3>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>

            <figure class="card-img-full">
                <img src="assets/imgs/tina-dawson-f1krjnOeWDk-unsplash.jpg" alt="Post follow">
                <figcaption>
                    <h3>Building you API stack</h3>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>
        </div>

    </section>
    <!-- -------------------------------------------------------------------------- -->
    <section class="container">
        <div class="title-tool">
            <h2>Recent blog posts</h2>
            <a href="<?= SITE_PATH?>pages/section.php?all=tutorials">See all</a>
        </div>
        <div class="posts-row">
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
    <!-- -------------------------------------------------------------------------- -->
    <section class="container">
        <div class="title-tool">
            <h2>Discover new tips...</h2>
            <a href="<?= SITE_PATH?>pages/section.php?all=tips">See all</a>
        </div>
        <div class="posts-row container-list">
            <figure class="card-side-content">
                <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                <figcaption>
                    <h3>Top 10 Ergonomic chair </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi... </p>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>

            <figure class="card-side-content">
                <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                <figcaption>
                    <h3>Top 3 new books </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi.. </p>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>

            <figure class="card-side-content">
                <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                <figcaption>
                    <h3>Top 3 Places to see in paris</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi.. </p>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>

            <figure class="card-side-content">
                <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                <figcaption>
                    <h3>Top 5 ultra laptops 2024</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi.. </p>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>

            <figure class="card-side-content">
                <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                <figcaption>
                    <h3>Top 100 Universities 2024 </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi... </p>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>

            <figure class="card-side-content">
                <img src="assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                <figcaption>
                    <h3>Top 1 populaire music of Mars</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi... </p>
                    <div class="meta-info-container">
                        <img src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                        <p>Lana steinler</p>
                        <p>18 Jan 2024</p>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
</main>



<?php include_once "inc/footer.html.php"; ?>