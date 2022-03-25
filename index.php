<?php
require 'head.php';
require 'header.php';
?>


<!-- <section class="section-index">
    <div class="panneau-index">
        <h1>WishList</h1>
        <h5>Votre liste de souhaits personnalisée.</h3>
    </div>
    <div class="boutons">
        <span><button onclick="window.location.href = 'listing.php';">Wishlist</button></span>
        <span><button onclick="window.location.href = 'listing.php';">Wishlist</button></span>
        <span><button onclick="window.location.href = 'listing.php';">Wishlist</button></span>
    </div>
    <img src="images/rayman-index.png" alt="Gorgula" id="rayman">
</section> -->

<main class="main-index">
    <section class="section-index">
        <a href="listing.php" class="index-link">
            <div id="index-buttons">
                <div id="index-button1" class="index-button">
                    <div class="index-button-text">
                        <h1>WishList</h1>
                        <p>Découvrez la liste des jeux qui ont marqué nos enfances.</p>
                    </div>
                </div>
        </a>
        <a href="form_recherche.php" class="index-link">
            <div id="index-button2" class="index-button">
                <div class="index-button-text">
                    <h1>Recherche</h1>
                    <p>Envie de consulter les informations sur un jeu en particulier ?</p>
                    <p>C'est là que ça se passe !</p>
                </div>
            </div>
        </a>
        <a href="https://mmi21g01.h205.online/index.php" class="index-link" target="blank">
            <div id="index-button4" class="index-button">
                <div class="index-button-text">
                    <h1>Indie Sound</h1>
                    <p>Notre précédent site, destiné aux fans de musiques de jeux indépendants.</p>
                </div>
            </div>
        </a>
        <a href="/admin/admin.php" class="index-link">
            <div id="index-button3" class="index-button">
                <div id="index-button-text-3">
                    <h1>Admin</h1>
                    <p>Si vous ne savez pas ce que c'est, pas besoin de cliquer !</p>
                </div>
            </div>
        </a>

        </div>
    </section>
</main>

<?php
require 'footer.php';
require 'end.php';
?>