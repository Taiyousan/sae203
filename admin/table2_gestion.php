<!DOCTYPE html>
<html>
<?php
require '../head.php';
require 'header_admin.php';
?>


<body>
    <section class="index-admin">
        <div class="tableau-admin">

            <p><a href="table2_new_form.php">Ajouter un développeur</a></p>
            <?php
            require '../lib_crud.inc.php';
            $co = connexionBD();
            afficherListe2($co);
            deconnexionBD($co);
            ?>
        </div>
    </section>
</body>

</html>