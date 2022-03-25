<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 2 - Modifier</title>
</head>

<body style="font-family:sans-serif;">
    <section class="index-admin">


        <div class="container-admin">
            <div class="tableau-admin">
                <?php
                require '../lib_crud.inc.php';

                $id = $_GET['num'];
                $co = connexionBD();
                $album = getBD2($co, $id);
                deconnexionBD($co);
                ?>

                <form action="table2_update_valide.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="num" value="<?= $id; ?>" />

                    Nom : <input type="text" name="nom" value="<?= $album['dev_nom']; ?>" required /><br />
                    Année de création : <input type="number" name="annee" value="<?= $album['dev_annee']; ?>" required /><br />
                    Directeur : <input type=" text" name="directeur" value="<?= $album['dev_directeur']; ?>" required /><br />
                    Nationalité : <input type=" text" name="nationalite" value="<?= $album['dev_nationalite']; ?>" required /><br />
                    <?php
                    $co = connexionBD();
                    //afficherAuteursOptionsSelectionne($co, $album['_dev_id']);
                    deconnexionBD($co);
                    ?>
                    </select><br />
                    <input type="submit" value="Modifier" />
                </form>
            </div>
        </div>
    </section>
</body>

</html>