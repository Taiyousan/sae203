<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 2 - Modifié</title>
</head>

<body style="font-family:sans-serif;">
    <section class="index-admin">


        <div class="container-admin">
            <div class="tableau-admin">
                <?php
                require '../lib_crud.inc.php';

                $id = $_POST['num'];
                $nom = $_POST['nom'];
                $annee = $_POST['annee'];
                $directeur = $_POST['directeur'];
                $nationalite = ($_POST['nationalite']);





                $co = connexionBD();
                modifierBD2(
                    $co,
                    $id,
                    $nom,
                    $annee,
                    $directeur,
                    $nationalite
                );
                deconnexionBD($co);
                ?>
            </div>
        </div>
    </section>
</body>

</html>