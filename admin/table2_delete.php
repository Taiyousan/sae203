<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 2 - Suppression</title>
</head>

<body style="font-family:sans-serif;">
    <section class="index-admin">


        <div class="container-admin">
            <div class="tableau-admin">
                <?php
                require '../lib_crud.inc.php';

                $id = $_GET['num'];

                $co = connexionBD();
                effacerBD2($co, $id);
                deconnexionBD($co);
                ?>

                <a href="table2_gestion.php">Retour au tableau de gestion</a>
            </div>
        </div>
    </section>
</body>

</html>