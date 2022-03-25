<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 1 - Modifier</title>
</head>

<body style="font-family:sans-serif;">
    <section class="index-admin">


        <div class="container-admin">
            <div class="tableau-admin">
                <?php
                require '../lib_crud.inc.php';

                $id = $_GET['num'];
                $co = connexionBD();
                $album = getBD($co, $id);
                deconnexionBD($co);
                ?>

                <form action="table1_update_valide.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="num" value="<?= $id; ?>" />

                    Nom : <input type="text" name="nom" value="<?= $album['jeu_nom']; ?>" required /><br />
                    Genre : <input type=" text" name="genre" value="<?= $album['jeu_genre']; ?>" required /><br />
                    Année : <input type=" number" name="annee" value="<?= $album['jeu_annee']; ?>" required /><br />
                    Plateforme : <input type=" text" name="plateforme" value="<?= $album['jeu_plateforme']; ?>" required /><br />
                    Editeur : <input type=" text" name="editeur" value="<?= $album['jeu_editeur']; ?>" required /><br />
                    Note : <input type=" number" name="notejvc" value="<?= $album['jeu_notejvc']; ?>" required /><br />
                    Commentaire : <input name="commentaire" value="<?= $album['jeu_commentaire']; ?>" required> </input><br />
                    Image : <input type="file" name="image" required /><br />
                    Développeur : <select name="dev" value="<?= $dev['dev_nom']; ?>" required>
                        <?php
                        $co = connexionBD();
                        afficherAuteursOptionsSelectionne($co, $album['_dev_id']);
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