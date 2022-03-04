<?php
require 'head.php';
require 'header.php';
?>

<section class="hero-wrap js-fullheight">
    <div class="container px-0">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate text-center">
                <div class="desc">
                    <div class="gallery">
                        <?php
                        $mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'root', '');
                        // $mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'TheBindingOfIsaacRepentance');
                        $mabd->query('SET NAMES utf8;');
                        $req = "SELECT * FROM jeux INNER JOIN dev ON jeux._dev_id = dev.dev_id";
                        $resultat = $mabd->query($req);
                        foreach ($resultat as $value) {
                            echo '<div class="album">';
                            echo '<h3>' . $value['jeu_nom'] . '</h3>';
                            echo '<br> Genre : ' . $value['jeu_genre'];
                            echo '<br> Année de sortie : ' . $value['jeu_annee'];
                            echo '<br> Plateforme: ' . $value['jeu_plateforme'];
                            echo '<br> Année de sortie : ' . $value['jeu_annee'];
                            echo '<br> Éditeur : ' . $value['jeu_editeur'];
                            echo '<br> Développeur(s) : ' . $value['dev_nom'];
                            echo '<br> Note jeuxvideo.com : ' . $value['jeu_notejvc'];
                            echo '<br> Mon avis : ' . $value['jeu_commentaire'];
                            echo '<div class="album-image">';
                            echo '<br> <img class="image" src=' . $value['jeu_image'] . '>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


<!-- <section id="gallery">
    <div id="titre">
        <h1>WISHLIST</h1>
    </div>

    <div id="presentation">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis corporis ipsa, amet quam accusantium iusto molestiae ab sequi consequatur, quaerat harum totam? Optio cum quia in saepe illum aperiam vero.</p>
    </div>

    <div id="table">
        <div class="gallery">
            <div class="element">
                <img src="images/isaac.jpg" alt="The Binding of Isaac">
                <p>The Binding of Isaac : Rebirth</p>
                <table>
                    <tr>
                        <td>Nom :</td>
                        <td>The Binding of Isaac : Rebirth</td>
                    </tr>
                    <tr>
                        <td>Genre :</td>
                        <td>Rogue-like</td>
                    </tr>
                    <tr>
                        <td>Année de sortie :</td>
                        <td>2014</td>
                    </tr>
                    <tr>
                        <td>Plateforme :</td>
                        <td>PC</td>
                    </tr>

                </table>
            </div>
            <div class="element"></div>
            <div class="element"></div>
            <div class="element"></div>
            <div class="element"></div>
            <div class="element"></div>
        </div>
    </div>
</section> -->


<?php
require 'footer.php';
require 'end.php';
?>