<?php
if ($title != 'login' && $title != "signup") { ?>

    <footer>
        <div class='container'>

            
                <ul>

                    <h3>Similaire to us</h3>
                    <li><a href='https://www.metier.org/'>Metier.org</a></li>
                    <li><a href='https://fr.wikihow.com/Accueil'>Whikihow</a></li>
                    <li><a href='https://se.pinterest.com/'>Pintrest</a></li>

                </ul>
                <ul>
                    <h3>Social Media</h3>
                    <li><a href='https://x.com/'>X</a></li>
                    <li><a href='www.linkedin.com/in/issa-jafari'>LinkedIn</a></li>
                    <li><a href='https://socialbookapplis.netlify.app/'>Facebook</a></li>
                    <li><a href='https://github.com/Issa150/Project-Blog-1'>GitHub</a></li>

                </ul>

                <ul>
                    <h3>Legal</h3>
                    <li><a href=''>Terms</a></li>
                    <li><a href=''>privacy</a></li>
                    <li><a href=''>Contact</a></li>

                </ul>
        </div>
        <div class='container'>
            <h2>IdeaPedia</h2>
            <p>&copy; <?= date('Y') ?> Blog_1. All rights are reserved.</p>
        </div>
    </footer>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= SITE_PATH ?>assets/js/script.js"></script>
</body>

</html>