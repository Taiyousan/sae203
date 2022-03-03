<?php
if ((empty($_POST['prenom'])) || (empty($_POST['age']))) {
    header('Location: form1.php');
}
$prenom = $_POST['prenom'];
$age = $_POST['age'];



echo '<p>Votre prénom : ' . filter_var($prenom, FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '</p>' . "\n";
echo '<p>Votre âge : ' . filter_var($age, FILTER_SANITIZE_NUMBER_INT) . '</p>' . "\n";
