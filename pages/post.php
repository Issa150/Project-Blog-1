<?php
include_once "../inc/session_security.php";
include_once "../inc/function.php";
include_once "../classes/Posts_class.php";
include_once "../classes/General_class.php";
include_once "../classes/Comments_class.php";
$generalClass = new Genreal();
$postClassvar = new Posts();
$comments = new Comments();

///////////::





/////////////////////////////////////////  //

// ************  Login check  ************//
// *** this page is open for all people to navigate and just see the contents


// in this page everithing about the Post should be acceesible  except Adding comments!!!!
$id_post = $_GET['id'];
$commentsData = $comments->getCommentsByPostId($id_post);
$post = $postClassvar->getSingleJoin($id_post);



// $post = $postClassvar->getSingle(5);


// when good content exist, remove this initiation from DB🔽🔽🔽🔽🔽
// $post = $postClassvar->getSingle('5');
$commentErr = "";
if (isset($_SESSION['current_user'])) {
    if (!empty($_POST)) {
        $post_id = $id_post;
        // $post_id = 5;
        $user_id = $_SESSION['current_user']['id'];
        $comment_text = $_POST['comment'];
        if (empty($comment_text) && strlen($comment_text) < 2) {
            $commentErr = "Comment can not be empty!";
        } else {
            // echo "post id: $post_id, user id: $user_id, comment: $comment_text";
            $comments->insertComment($post_id, $user_id, $comment_text);
            header('Location:' . SITE_PATH . 'pages/post.php?id=' . $id_post);
        }
    }
}
// $commentsData = $comments->getCommentsByPostId($post['id']);
$metaTitle = $post['title'];
$metaDescription = (strlen($post['body']) > 120) ? substr(htmlspecialchars_decode($post['body']), 0, 120) . '...' : htmlspecialchars_decode($post['body']);
$title = "post";
include_once "../inc/header.html.php";
include_once "../inc/components/nav.php";

?>

<main>
    <section class="container">


        <article>
            <img src="<?= !empty($post['image_cover']) ? SITE_PATH . "assets/imgs/posts/"  . $post['image_cover'] : SITE_PATH . "assets/imgs/initials/placeholder.png" ?>" alt="">
            <div class="meta-info-container">
                <img src="<?= !empty($post['image']) ? SITE_PATH . "assets/imgs/profile/"  . $post['image'] : SITE_PATH . "assets/imgs/profile/placeholder-man-img.jpg" ?>" alt="Profile-author">
                <p><?= $post['username'] ?></p>
                <!-- <i class="fa-solid fa-bookmark"></i> -->
            </div>
            <h1><?= $post['title'] ?></h1>
            <p><?= htmlspecialchars_decode($post['body']) ?></p>

            <!--*************   Comments  ************** -->
            <div class="input">
                <h2><?php
                    // if ($comments->getCommentsByPostId($post['id']) == null) {
                    if ($commentsData == null) {
                        echo 'No comments yet';
                    } else {
                        echo 'Comments';
                    } ?>
                </h2>
                <!--********* Add new comments  ***********  -->
                <?php if (isset($_SESSION['current_user'])) { ?>
                    <div class="new-comment">
                        <form action="" method="post">
                            <textarea name="comment" id="" placeholder="please write your opinion..."></textarea>
                            <p class="alert-msg"><?= $commentErr ? $commentErr : "" ?></p>
                            <button>Submit</button>
                        </form>

                    </div>
                <?php } else { ?>
                    <div class="input">
                        <h3 class="alert-red">Please login to add comment</h3>
                        <textarea disabled name="" id="" placeholder="please write your opinion..."></textarea>
                        <button disabled>Submit</button>
                    </div>
                <?php } ?>

                <!--********* show comments  ***********  -->
                <?php
                if ($commentsData > 0) {
                    foreach ($commentsData as $comment) { ?>
                        <div class="comment">
                            <div class="profile">
                                <img src="<?= !empty($comment['commneter_img']) ? SITE_PATH . "assets/imgs/profile/"  . $comment['commneter_img'] : SITE_PATH . "assets/imgs/profile/placeholder-man-img.jpg" ?>" alt="Profile-author">
                                <p><?= $comment['commentor_username'] ?></p>
                            </div>
                            <p class="input"><?= $comment['comment_text'] ?></p>
                        </div>
                <?php }
                } ?>
            </div>
        </article>

        <aside>
            <h4>Monthly archive:</h4>
            <div class="months-wrapper">

                <?php for ($x = 1; $x <= 6; $x++) { ?>
                    <p class="monthes-archive">January</p>
                <?php } ?>
            </div>

        </aside>

    </section>
</main>





<?php include_once "../inc/footer.html.php";
