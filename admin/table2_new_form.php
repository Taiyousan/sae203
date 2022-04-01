<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 2 - Ajout</title>
</head>

<section class="index-admin">
    <div class="container-admin">

        <div class="tableau-admin">

            <body style="font-family:sans-serif;">

                <h1>Ajouter un développeur</h1>
                <hr />
                <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
                    Nom : <input type="text" name="nom" required /><br />
                    Année : <input type="number" name="annee" required /><br />
                    Directeur : <input type="text" name="directeur" required /><br />
                    Nationalité : <input type="text" name="nationalite" required /><br />
                    <?php
                    require '../lib_crud.inc.php';
                    $co = connexionBD();

                    deconnexionBD($co);
                    ?>
                    </select><br />
                    <input type="submit" value="Ajouter" />
                </form>
            </body>
        </div>
    </div>
</section>

</html>