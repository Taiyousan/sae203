<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>GESTION DES JEUX</title>

</head>

<body>
    <section class="index-admin">



        <div class="tableau-admin">
            <p><a href="table1_new_form.php">Ajouter un jeu</a></p>
            <?php
            require '../lib_crud.inc.php';
            $co = connexionBD();
            afficherListe($co);
            deconnexionBD($co);
            ?>
        </div>


    </section>
</body>

</html>