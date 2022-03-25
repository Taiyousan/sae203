<?php
require 'head.php';
require 'header.php';
require 'lib_crud.inc.php';
?>
<section class="listing">
    <div class="container-background">
        <h1>Les jeux correspondant à votre recherche :</h1>
        <div class="gallery">
            <div class="catalogue">


                <?php

                $chaineRecherche2 = $_POST['search2'];
                $co = connexionBD();
                afficherResultatRecherche2($co, $chaineRecherche2);
                deconnexionBD($co);
                ?>
            </div>
        </div>
    </div>
    <div class="boutons-retour">
        <ul>
            <li><a href="index.php">Retour à l'accueil</a></li>
            <li><a href="form_recherche.php">NOUVELLE RECHERCHE</a></li>
        </ul>
    </div>
</section>

<?php
require 'footer.php';
require 'end.php';
?>