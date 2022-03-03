<?php
require 'head.php';
require 'header.php';
?>

<form action="" method="post" data-parsley-validate>
    <label for="prix_mini">Note minimale :</label>
    <input type="text" name="note_mini" id="note_mini" data-parsley-type="number">
    <label for="prix_maxi">Note maximale :</label>
    <input type="text" name="note_maxi" id="note_maxi" data-parsley-type="number">
    <input type="submit" value="Recherche">
</form>

<br>

<form action="form_recherche.php">
    <label for="real">Entrez un nom de réalisateur :</label>
    <input type="search" list="realisateurs" id="real" name="real" autocomplete="off" />
    <datalist id="realisateurs">
        <option value="Allen">
        <option value="Donner">
        <option value="Kubrick">
        <option value="Nolan">
        <option value="Tarantino">
        <option value="Tessari">
    </datalist>
    <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
</form>

<form class="formulairetest" method="post" action="t2.php">
    <label for="prenom">Votre prénom : </label>
    <input type="text" name="prenom" id="prenom"><br />
    <label for="age">Votre âge : </label>
    <input type="text" name="age" id="age"> ans.<br />
    <input type="submit" value="Envoyer">
</form>


<?php
require 'footer.php';
require 'end.php';
?>