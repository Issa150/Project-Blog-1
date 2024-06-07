<section>
        <div class="title-tool">
            <h2>My tutorials:</h2>
            <!-- <a href="<?php //= SITE_PATH ?>pages/flow.php?all=tutorials">See all</a> -->
        </div>
        <div class="posts-row">
            <?php for ($x = 0; $x < 7; $x++) { ?>
                <!-- <a href="<?php //= SITE_PATH ?>pages/post.php?id=<?php //= $var['id'] ?>"> -->
                    <!-- <article> -->
                        <figure class="card-main">
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
                    <!-- </article> -->
                <!-- </a> -->
            <?php } ?>
        </div>
    </section>
    <!-- -------------------------------------------------------------------------- -->
    <section >
        <div class="title-tool">
            <h2>My tips...</h2>
            <!-- <a href="<?php //= SITE_PATH ?>pages/flow.php?all=tips">See all</a> -->
        </div>
        <div class="posts-row container-list">
            <?php for ($x = 0; $x < 6; $x++) { ?>
                <a href="<?= SITE_PATH ?>pages/post.php?id=<?php //= $var['id'] ?>">
                    <figure class="card-side-content">
                        <img src="../assets/imgs/kaylah-matthews-6e5hgWV2DAo-unsplash.jpg" alt="Post image">
                        <figcaption>
                            <h3>Top 10 Ergonomic chair </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti modi nisi hic voluptate commodi... </p>
                            <div class="meta-info-container">
                                <img src="../assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                                <p>Lana steinler</p>
                                <p>18 Jan 2024</p>
                            </div>
                        </figcaption>
                    </figure>
                </a>

            <?php } ?>



        </div>
    </section>