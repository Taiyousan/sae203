<?php
require 'head.php';
require 'header.php';
?>

<section class="hero-wrap js-fullheight">
    <div class="container px-0">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true" id="recherche-corps">
            <div class="col-md-12 ftco-animate text-center">
                <div class="desc" id="recherche-desc">
                    <form action="form/form_recherche.php" method="post" data-parsley-validate>
                        <label for="prix_mini">Note minimale :</label>
                        <input type="text" name="note_mini" id="note_mini" data-parsley-type="number">
                        <label for="prix_maxi">Note maximale :</label>
                        <input type="text" name="note_maxi" id="note_maxi" data-parsley-type="number">
                        <input type="submit" value="Recherche">
                    </form>

                    <br>

                    <form action="form/form_recherche.php">
                        <label for="real">Entrez un nom de réalisateur :</label>
                        <input type="search" list="realisateurs" id="real" name="real" autocomplete="off" />
                        <datalist id="realisateurs">
                            <option value="Allen">
                            <option value="Donner">
                            <option value="Kubrick">
                            <option value="Nolan">
                            <option value="Tarantino">
                            <option value="Tessari">
                        </datalist>
                        <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
                    </form>

                    <form class="formulairetest" method="post" action="t2.php">
                        <label for="prenom">Votre prénom : </label>
                        <input type="text" name="prenom" id="prenom"><br />
                        <label for="age">Votre âge : </label>
                        <input type="text" name="age" id="age"> ans.<br />
                        <input type="submit" value="Envoyer">
                    </form>
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




<?php
require 'footer.php';
require 'end.php';
?>