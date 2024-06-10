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
$postsClass = new Posts();
$postSlides = $postsClass->getAll("ORDER BY id DESC LIMIT 5");
$postsTutorials = $postsClass->getAllJoin(1,"ORDER BY id DESC LIMIT 3");
$postsTips = $postsClass->getAllJoin(2,"ORDER BY id DESC LIMIT 6");
?>

<header>
    <?php   ?>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <?php foreach ($postSlides as $post) : ?>
                <div class="swiper-slide">
                    <img loading="lazy" src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="a woman cooking in the kitchen.">
                    <div class="content">
                        <div class="container">
                            <h3><?= $post['title'] ?></h3>
                            <p><?=  (strlen($post['body']) > 300) ? substr(htmlspecialchars_decode($post['body']), 0, 300) . '...' : htmlspecialchars_decode($post['body'])?></p>
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
            <h2>Recent blog tutorials:</h2>
            <a href="<?= SITE_PATH ?>pages/flow.php?all=1">See all</a>
        </div>
        <div class="posts-row">
            <?php foreach ($postsTutorials as $post) { ?>
                <a href="<?= SITE_PATH ?>pages/post.php?id=<?= $post['id']?>">
                    <!-- <article> -->
                        <figure class="card-main">
                            <img loading="lazy" src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="<?= $post['image_cover']?>">
                            <figcaption>
                                <div>
                                    <h3><?= (strlen(htmlspecialchars_decode($post['title'])) > 33) ? substr(htmlspecialchars_decode($post['title']), 0, 33). '...' : htmlspecialchars_decode($post['title']) ?></h3>
                                    <!-- <p><?//= htmlspecialchars_decode($post['body']) ?></p> -->
                                    <p><?= (strlen(htmlspecialchars_decode($post['body'])) > 160) ? substr(htmlspecialchars_decode($post['body']), 0, 160). '...' : htmlspecialchars_decode($post['body']) ?></p>
                                </div>
                                
                                <div class="meta-info-container">
                                    <!-- <img loading="lazy" src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author"> -->
                                    <img loading="lazy" src="<?= !empty($post['author_image']) ? SITE_PATH . "assets/imgs/profile/"  . $post['author_image'] : SITE_PATH . "assets/imgs/profile/placeholder-general-img.png" ?>" alt="<?= $post['author_image']?>">
                                    <p><?= $post['author'] ?></p>
                                    <p class="date"><?=  date('d-m-Y', strtotime($post['created_at'])) ?></p>
                                </div>
                            </figcaption>
                        </figure>
                    <!-- </article> -->
                </a>
            <?php } ?>
        </div>
    </section>
    <!-- -------------------------------------------------------------------------- -->
    <section class="container">
        <div class="title-tool">
            <h2>Discover new tips...</h2>
            <a href="<?= SITE_PATH ?>pages/flow.php?all=2">See all</a>
        </div>
        <div class="posts-row container-list">
            <?php foreach ($postsTips as $post) { ?>
                <a href="<?= SITE_PATH ?>pages/post.php?id=<?= $post['id']?>">
                    <figure class="card-side-content">
                    <img loading="lazy" src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="<?= $post['image_cover']?>">
                        <figcaption>
                            <div>
                                <h3><?= (strlen(htmlspecialchars_decode($post['title'])) > 33) ? substr(htmlspecialchars_decode($post['title']), 0, 33). '...' : htmlspecialchars_decode($post['title']) ?></h3>
                                <p><?= (strlen(htmlspecialchars_decode($post['body'])) > 90) ? substr(htmlspecialchars_decode($post['body']), 0, 90). '...' : htmlspecialchars_decode($post['body']) ?></p>
                            </div>
                            <div class="meta-info-container">
                            <img loading="lazy" src="<?= !empty($post['author_image']) ? SITE_PATH . "assets/imgs/profile/"  . $post['author_image'] : SITE_PATH . "assets/imgs/profile/placeholder-general-img.png" ?>" alt="<?= $post['author_image']?>">
                                <p><?= $post['author'] ?></p>
                                <p><?=  date('d-m-Y', strtotime($post['created_at'])) ?></p>
                            </div>
                        </figcaption>
                    </figure>
                </a>

            <?php } ?>



        </div>
    </section>
</main>



<?php include_once "inc/footer.html.php"; ?>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis modi qui incidunt ex? Deleniti, autem in hic ipsum adipisci eveniet quo esse, voluptas amet praesentium ab, sequi beatae illum sit.