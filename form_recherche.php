<?php
require 'head.php';
require 'header.php';
?>

<section id="rech">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    </style>
    <div class="container-rech2" id="layt">
        <div class="container-rech2-h1">
            <h1> RECHERCHE PAR DEVELOPPEUR</h1>
        </div>
        <div class="form2">

            <br>
            <form action="reponse_recherche.php" method="POST" class="rech-input">
                <input type="text" id="dev_nom" name="search" list="dev" autocomplete="off" />
                <datalist id="dev">
                    <?php
                    // On va afficher ici la datalist
                    require 'lib_crud.inc.php';
                    $co = connexionBD();
                    genererDatalistAuteurs($co);
                    deconnexionBD($co);
                    ?>
                </datalist>
                <input type="submit" value="RECHERCHER">
            </form>
        </div>
    </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    </style>
    <div class="container-rech2" id="pw">
        <div class="container-rech2-h1">
            <h1> RECHERCHE PAR JEU</h1>
        </div>
        <div class="form2">

            <br>
            <form action="reponse_recherche2.php" method="POST" class="rech-input">
                <input type="text" id="jeu_nom" name="search2" list="jeux" autocomplete="off" />



                <input type="submit" value="RECHERCHER">
            </form>
        </div>
    </div>
    </div>
</section>







<?php
require 'footer.php';
require 'end.php';
?>
<?php

$chaineRecherche2 = $_POST['search2'];
require 'lib_crud.inc.php';
$co = connexionBD();
afficherResultatRecherche2($co, $chaineRecherche2);
deconnexionBD($co);
?>