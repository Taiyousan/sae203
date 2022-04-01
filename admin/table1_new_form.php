<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 1 - Ajout</title>
</head>

<body style="font-family:sans-serif;">
    <section class="index-admin">


        <div class="container-admin">
            <div class="tableau-admin">
                <h1>Ajouter un jeu</h1>
                <hr />
                <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
                    Nom : <input type="text" name="nom" required /><br />
                    Genre : <input type="text" name="genre" required /><br />
                    Année : <input type="number" name="annee" required /><br />
                    Plateforme : <input type="text" name="plateforme" required /><br />
                    Editeur : <input type="text" name="editeur" required /><br />
                    Note : <input type="number" name="notejvc" required /><br />
                    Commentaire : <textarea name="commentaire" required> </textarea><br />
                    Image : <input type="file" name="image" required /><br />
                    Développeur : <select name="dev" required>
                        <?php
                        require '../lib_crud.inc.php';
                        $co = connexionBD();
                        afficherAuteursOptions($co);
                        deconnexionBD($co);
                        ?>
                    </select><br />
                    <input type="submit" value="Ajouter" />
                </form>
            </div>
        </div>
    </section>
</body>

</html>