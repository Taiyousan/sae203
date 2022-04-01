<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>

<head>
    <title>TABLE 1 - Modifié</title>
</head>

<body style="font-family:sans-serif;">
    <section class="index-admin">


        <div class="container-admin">
            <div class="tableau-admin">
                <?php
                require '../lib_crud.inc.php';

                $id = $_POST['num'];
                $nom = $_POST['nom'];
                $genre = $_POST['genre'];
                $annee = $_POST['annee'];
                $plateforme = $_POST['plateforme'];
                $editeur = ($_POST['editeur']);
                $dev = $_POST['dev'];
                $note = $_POST['notejvc'];
                $commentaire = trim($_POST['commentaire']);





                $imageType = $_FILES["image"]["type"];
                if (($imageType != "image/png") &&
                    ($imageType != "image/jpg") &&
                    ($imageType != "image/jpeg")
                ) {
                    echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
                    echo 'Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
                    die();
                }

                $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["image"]["name"];

                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    if (!move_uploaded_file(
                        $_FILES["image"]["tmp_name"],
                        "../images/" . $nouvelleImage
                    )) {
                        echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
                        die();
                    }
                } else {
                    echo '<p>Problème : image non chargée...</p>' . "\n";
                    die();
                }

                $co = connexionBD();
                modifierBD(
                    $co,
                    $id,
                    $nom,
                    $genre,
                    $annee,
                    $plateforme,
                    $editeur,
                    $dev,
                    $note,
                    $commentaire,
                    $nouvelleImage
                );
                deconnexionBD($co);
                ?>
            </div>
        </div>
    </section>
</body>

</html>