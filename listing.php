<?php
require 'head.php';
require 'header.php';
require 'lib_crud.inc.php';
?>

<section class="listing">
    <h1>WishList</h1>
    <div class="gallery">
        <div class="catalogue">

            <?php

            $mabd = connexionBD();

            afficherCatalogue($mabd);

            deconnexionBD($mabd);

            ?>
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