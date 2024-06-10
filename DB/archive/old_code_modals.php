<div id="modal">


    <form action="" method="post" id="editProfileform" enctype='multipart/form-data'>
        <h2>Add new post</h2>
        <?php
        if (isset($_GET['update'])) {
            dump($_SESSION);
        }
        ?>
        <fieldset class="grid-col-6">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="">
        </fieldset>

        <fieldset class="grid-col-6">
            <label for="mytextarea">Body:</label>
            <!-- <textarea name="body" id="body" cols="30" rows="10"></textarea> -->
            <textarea name="body" id="mytextarea" placeholder="Description..." cols="30" rows="10"></textarea>

        </fieldset>

        <fieldset class="grid-col-6">
            <label for="post_cover">
                <span>
                    <i class="fa-solid fa-photo-film"></i>
                    Image cover
                </span>
                <input type="file" name="post_cover" id="post_image_banner">
            </label>
        </fieldset>

        <fieldset class="grid-col-3">
            <label for="draft"> Thematics: <span class="alert">Required*</span></label>
            <div class="input">
                <?php foreach ($thematics->getAll() as $thematic) : ?>
                    <div>
                        <input type="radio" name="thematic" value="<?= $thematic['id'] ?>" id="draft"> <?= $thematic['title'] ?>
                    </div>
                <?php endforeach ?>
                <p class="alert-msg"><?= $thematicErr ? $thematicErr : "" ?></p>
            </div>
        </fieldset>

        <fieldset class="grid-col-3">
            <label> Categories</label>
            <div class="input">
                <?php
                if (count($allCategories) == 0) { ?>

                    <p class="empty">No categories created yet</p>
                    <a class="guiding btn" href="<?= SITE_PATH ?>admin/dashboard.php?categories">Add a new category</a>


                    <?php } else {
                    foreach ($allCategories as $categorie) { ?>
                        <div>
                            <input type="checkbox" name="category[]" value="<?= $categorie['id'] ?>"> <?= $categorie['title'] ?>
                        </div>
                <?php  }
                } ?>
            </div>
        </fieldset>

        <fieldset class="grid-col-6">
            <label for="draft"><i class="fa-solid fa-clock-rotate-left"></i> Save it as draft</label>
            <input type="radio" name="draft" value="0" id="draft">
        </fieldset>

        <div class="grid-full-width">
            <button id="cancelModal" formmethod="dialog">Cancel</button>
            <!-- <button type="submit">Publish</button> -->
            <input class="btn btn-success" type="submit" name="formType" value="Publish the post">
        </div>

    </form>
</div>

<!--  -->
<div>
    <input value="<?php echo $category['id'] ?>" <?php echo (isset($post) && in_array(strtolower($category['title']), array_map('strtolower', explode(',', $post['categories'])))) ? "checked" : "" ?> type="checkbox" name="category[]"> <?php echo $category['title'] ?>
</div>
<!-- Table thematic *** Date time seperated easy -->
<table>
            <thead>
                <tr>
                    <th class="post-title">Title</th>
                    <th>Description</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($allThematics as $thematic) : ?>
                    <tr>
                        <td><?= $thematic['title'] ?></td>
                        <td><?= $thematic['description'] ?></td>
                        <td><?= $general_class->counter('posts', 'thematic_id', $thematic['id'], $_SESSION['current_user']['id'])["COUNT(*)"]; ?></td>
                        <!-- <td><? //= date('Y-m-d', strtotime($post['created_at'])) 
                                    ?></td> -->
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
<!-- /////////////////// -->
 <!-- Footer -->
 <?php 
if($title != 'login' && $title != "signup"){ ?>
    
        <footer>
            <div class='container'>
                <ul>

                    <h3>Product</h3>

                    <!-- <li><a href=''>Overview</a></li> -->
                    <!-- <li><a href=''>Features</a></li> -->
                    <!-- <li><a href=''>Solutions</a></li> -->
                    <li><a href=''>Tutorials</a></li>
                    <!-- <li><a href=''>Pricing</a></li> -->
                    <!-- <li><a href=''>Releases</a></li> -->
                </ul>

                <ul>
                    <!-- <h3>Company</h3> -->
                    <!-- <li><a href=''>About us</a></li> -->
                    <!-- <li><a href=''>Careers</a></li> -->
                    <!-- <li><a href=''>press</a></li> -->
                    <!-- <li><a href=''>News</a></li> -->
                    <!-- <li><a href=''>Media kit</a></li> -->
                    <li><a href=''>Contact</a></li>

                </ul>

                <ul>
                    <h3>Resources</h3>
                    <!-- <li><a href=''>Blog</a></li> -->
                    <!-- <li><a href=''>Newsletter</a></li> -->
                    <!-- <li><a href=''>Events</a></li> -->
                    <!-- <li><a href=''>Help centre</a></li> -->
                    <li><a href=''>Tutorials</a></li>
                    <!-- <li><a href=''>Support</a></li> -->

                </ul>

                <ul>
                    <!-- <h3>Use cases</h3> -->
                    <!-- <li><a href=''>Startups</a></li> -->
                    <!-- <li><a href=''>Enterprise</a></li> -->
                    <!-- <li><a href=''>Government</a></li> -->
                    <!-- <li><a href=''>SaaS</a></li> centre -->
                    <!-- <li><a href=''>Marketplaces</a></li> -->
                    <!-- <li><a href=''>Ecommerce</a></li> -->

                </ul>

                <ul>
                    <h3>Social Media</h3>
                    <li><a href=''>Twitter</a></li>
                    <li><a href=''>LinkedIn</a></li>
                    <li><a href=''>Facebook</a></li>
                    <li><a href=''>GitHub</a></li>
                    <li><a href=''>AngelList</a></li>
                    <li><a href=''>Dribbble</a></li>

                </ul>

                <ul>
                    <h3>Legal</h3>
                    <li><a href=''>Terms</a></li>
                    <li><a href=''>privacy</a></li>
                    <!-- <li><a href=''>Cookies</a></li> -->
                    <!-- <li><a href=''>Licenses</a></li> -->
                    <!-- <li><a href=''>Settings</a></li> -->
                    <li><a href=''>Contact</a></li>

                </ul>
            </div>
            <div class='container'>
                <h2>IdeaPedia</h2>
                <p>&copy; <?= date('Y')?> Blog_1. All rights are reserved.</p>
            </div>
        </footer>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= SITE_PATH ?>assets/js/script.js"></script>
</body>

</html>
<!-- //////////////: -->
 <!-- Folowign post -->
 <?php if (isset($_SESSION['current_user'])) { ?>
        <section class="container">
            <div class="title-tool">
                <h2>My followings recent releases</h2>
                <a href="<?= SITE_PATH ?>pages/flow.php?all=followings">See all</a>
            </div>
            <div class="posts-row">
                <?php for ($x = 0; $x < 3; $x++) { ?>
                    <a href="<?= SITE_PATH ?>pages/post.php?id=<?php //=$var['id']?>">

                        <figure class="card-img-full">
                            <img loading="lazy" src="assets/imgs/tina-dawson-f1krjnOeWDk-unsplash.jpg" alt="Post follow">
                            <figcaption>
                                <h3>Building you API stack</h3>
                                <div class="meta-info-container">
                                    <img loading="lazy" src="assets/imgs/profile/hannah-skelly-g5A9gO59ERU-unsplash.jpg" alt="Profile-author">
                                    <p>Lana steinler</p>
                                    <p>18 Jan 2024</p>
                                </div>
                            </figcaption>
                        </figure>

                    </a>
                <?php } ?>
            </div>

        </section>
    <?php } ?>