<?php
// LIBRAIRIE "lib_crud.inc.php"
// 2022 - BUT MMI - IUT Troyes - URCA
// JL

// insertion des dépendances
require 'secretxyz123.inc.php';
require 'head.php';

// LIBRAIRIE DE FONCTIONS : BDD JEUX ---------------------------------------------------- 

// connexion à la base de données
function connexionBD()
{
    // on initialise la variable de connexion à null
    $mabd = null;
    try {
        // on essaie de se connecter
        // le port et le dbname ci-dessous sont À ADAPTER à vos données
        $mabd = new PDO(
            'mysql:host=127.0.0.1;port=3306;
                dbname=sae203;charset=UTF8;',
            LUTILISATEUR,
            LEMOTDEPASSE
        );
        // on passe le codage en utf-8
        $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // on retourne la variable de connexion
    return $mabd;
}

function afficherCatalogue($mabd)
{
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM jeux INNER JOIN dev ON jeux._dev_id = dev.dev_id";

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    foreach ($resultat as $value) {
        echo '<div class="album">';
        echo '<h3>' . $value['jeu_nom'] . '</h3>';
        echo '<div class="album-infos">';
        echo '<div class="album-image">';
        echo '<br> <img class="image" src=' . $value['jeu_image'] . '>';
        echo '</div>';
        echo '<div class="album-infos-texte">';

        echo '<br> <span class="tags">Genre :</span> ' . $value['jeu_genre'];
        echo '<br> <span class="tags">Année de sortie :</span> ' . $value['jeu_annee'];
        echo '<br> <span class="tags">Plateforme :</span> ' . $value['jeu_plateforme'];

        echo '<br> <span class="tags">Éditeur :</span> ' . $value['jeu_editeur'];
        echo '<br> <span class="tags">Développeur(s) :</span> ' . $value['dev_nom'];
        echo '<br> <span class="tags">Note jeuxvideo.com :</span> ' . $value['jeu_notejvc'];
        echo '</div>';
        echo '</div>';
        echo '<div class="album-commentaire">';
        echo '<br> <span class="tags" class="tag-commentaire">Mon avis :</span> ' . $value['jeu_commentaire'];
        echo '</div>';

        echo '</div>';
    }
}

// déconnexion de la base de données
function deconnexionBD(&$mabd)
{
    // on se déconnexte en mettant la variable de connexion à null 
    $mabd = null;
}

function afficherListe($mabd)
{
    $req = "SELECT * FROM jeux
            INNER JOIN dev
            ON jeux._dev_id = dev.dev_id";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<div id="gestion1" style="overflow-x:auto;">';
    echo '<table>' . "\n";
    echo '<thead><tr><th>Photo</th><th>Nom</th><th>Genre</th><th>Année</th><th>Plateforme</th><th>Editeur</th><th>Développeur</th><th>Note</th><th>Commentaire</th><th>Modifier</th><th>Supprimer</th></tr></thead>' . "\n";
    echo '<tbody>' . "\n";
    foreach ($resultat as $value) {
        echo '<tr>' . "\n";
        echo '<td><img class="photo" src="../' . $value['jeu_image'] . '" alt="image_' . $value['jeu_id'] . '" /></td>' . "\n";
        echo '<td>' . $value['jeu_nom'] . '</td>' . "\n";
        echo '<td>' . $value['jeu_genre'] . '</td>' . "\n";
        echo '<td>' . $value['jeu_annee'] . '</td>' . "\n";
        echo '<td>' . $value['jeu_plateforme'] . '</td>' . "\n";
        echo '<td>' . $value['jeu_editeur'] . '</td>' . "\n";
        echo '<td>' . $value['dev_nom'] .  '</td>' . "\n";
        echo '<td>' . $value['jeu_notejvc'] . '</td>' . "\n";
        echo '<td>' . $value['jeu_commentaire'] . '</td>' . "\n";
        echo '<td><a href="table1_update_form.php?num=' . $value['jeu_id'] . '">Modifier</a></td>' . "\n";
        echo '<td><a href="table1_delete.php?num=' . $value['jeu_id'] . '">Supprimer</a></td>' . "\n";
        echo '</tr>' . "\n";
        echo '</div>';
    }
    echo '</tbody>' . "\n";
    echo '</table>' . "\n";
}


function afficherAuteursOptions($mabd)
{

    $req = "SELECT * FROM dev";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    foreach ($resultat as $value) {
        echo '<option value="' . $value['dev_id'] . '">'; // id de l'auteur
        echo $value['dev_nom']; // prénom espace nom
        echo '</option>' . "\n";
    }
}



// fonction d'ajout d'une BD dans la table bande_dessinees
function ajouterBD($mabd, $nom, $genre, $annee, $plateforme, $editeur, $dev, $note, $commentaire, $nouvelleImage)
{
    $req = 'INSERT INTO jeux (jeu_nom, jeu_genre, jeu_annee, jeu_plateforme, jeu_editeur, _dev_id, jeu_notejvc, jeu_commentaire, jeu_image) VALUES ("' . $nom . '", "' . $genre . '", ' . $annee . ', "' . $plateforme . '", "' . $editeur . '", "' . $dev . '", ' . $note . ', "' . $commentaire . '", "images/' . $nouvelleImage . '")';

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le jeu ' . $nom . ' a été ajouté au catalogue.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
        die();
    }
}


// fonction d'effacement d'une BD
function effacerBD($mabd, $id)
{
    $req = 'DELETE FROM jeux WHERE jeu_id = ' . $id . '';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le jeu' . $id . ' a été supprimé du catalogue.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de la suppression.</p>' . "\n";
        die();
    }
}


// fonction de récupération des informations d'une BD
function getBD($mabd, $idAlbum)
{
    $req = 'SELECT * FROM jeux WHERE jeu_id=' . $idAlbum;
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // la fonction retourne le  tableau associatif 
    // contenant les champs et leurs valeurs
    return $resultat->fetch();
}


// afficher le "bon" auteur parmi les auteurs (prénom et nom)
// dans les balises "<option>"
function afficherAuteursOptionsSelectionne($mabd, $iddev)
{
    $req = "SELECT * FROM dev";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<option value="' . $value['dev_id'] . '"';
        if ($value['dev_id'] == $iddev) {
            echo ' selected="selected"';
        }
        echo '>';
        echo $value['dev_nom'];
        echo '</option>' . "\n";
    }
}


// fonction de modification d'une BD dans la table bande_dessinees
function modifierBD(
    $mabd,
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
) {
    $req = 'UPDATE jeux 
                SET 
                jeu_nom = "' . $nom . '",
    jeu_genre = "' . $genre . '",
    jeu_annee = ' . $annee . ',
    jeu_plateforme  = "' . $plateforme . '",
    jeu_editeur = "' . $editeur . '",
    _dev_id = "' . $dev . '",
    jeu_notejvc  = "' . $note . '",
    jeu_commentaire = "' . $commentaire . '",
    jeu_image = "../images/' . $nouvelleImage . '" WHERE jeu_id=' . $id;

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le jeu' . $nom . ' a été modifié.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de la modification.</p>' . "\n";
        die();
    }
}



// Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistAuteurs($mabd)
{
    // on sélectionne le nom et prénom de tous les auteurs de la table auteurs
    $req = "SELECT dev_nom FROM dev";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // pour chaque auteur, on met son nom et prénom dans une balise <option>
    foreach ($resultat as $value) {
        echo '<option value="' . $value['dev_nom'] . '">';
    }
}

function genererDatalistJeux($mabd)
{
    // on sélectionne le nom et prénom de tous les auteurs de la table auteurs
    $req = "SELECT jeu_nom FROM jeux";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // pour chaque auteur, on met son nom et prénom dans une balise <option>
    foreach ($resultat as $value) {
        echo '<option value="' . $value['jeu_nom'] . '">';
    }
}

function afficherResultatRecherche2($mabd, $chaine2)
{
    $req = 'SELECT * FROM jeux 
            INNER JOIN dev 
            ON jeux._dev_id = dev.dev_id
            WHERE jeu_nom LIKE "%' . $chaine2 . '%"';

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    foreach ($resultat as $value) {
        echo '<div class="album">';
        echo '<h3>' . $value['jeu_nom'] . '</h3>';
        echo '<div class="album-infos">';
        echo '<div class="album-image">';
        echo '<br> <img class="image" src=' . $value['jeu_image'] . '>';
        echo '</div>';
        echo '<div class="album-infos-texte">';

        echo '<br> <span class="tags">Genre :</span> ' . $value['jeu_genre'];
        echo '<br> <span class="tags">Année de sortie :</span> ' . $value['jeu_annee'];
        echo '<br> <span class="tags">Plateforme :</span> ' . $value['jeu_plateforme'];

        echo '<br> <span class="tags">Éditeur :</span> ' . $value['jeu_editeur'];
        echo '<br> <span class="tags">Développeur(s) :</span> ' . $value['dev_nom'];
        echo '<br> <span class="tags">Note jeuxvideo.com :</span> ' . $value['jeu_notejvc'];
        echo '</div>';
        echo '</div>';
        echo '<div class="album-commentaire">';
        echo '<br> <span class="tags" class="tag-commentaire">Mon avis :</span> ' . $value['jeu_commentaire'];
        echo '</div>';

        echo '</div>';
    }
}

// affichage des resultats de recherche
function afficherResultatRecherche($mabd, $chaine)
{
    $req = 'SELECT * FROM jeux 
            INNER JOIN dev 
            ON jeux._dev_id = dev.dev_id
            WHERE dev_nom LIKE "%' . $chaine . '%"';

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<div class="album">';
        echo '<h3>' . $value['jeu_nom'] . '</h3>';
        echo '<div class="album-infos">';
        echo '<div class="album-image">';
        echo '<br> <img class="image" src=' . $value['jeu_image'] . '>';
        echo '</div>';
        echo '<div class="album-infos-texte">';

        echo '<br> <span class="tags">Genre :</span> ' . $value['jeu_genre'];
        echo '<br> <span class="tags">Année de sortie :</span> ' . $value['jeu_annee'];
        echo '<br> <span class="tags">Plateforme :</span> ' . $value['jeu_plateforme'];

        echo '<br> <span class="tags">Éditeur :</span> ' . $value['jeu_editeur'];
        echo '<br> <span class="tags">Développeur(s) :</span> ' . $value['dev_nom'];
        echo '<br> <span class="tags">Note jeuxvideo.com :</span> ' . $value['jeu_notejvc'];
        echo '</div>';
        echo '</div>';
        echo '<div class="album-commentaire">';
        echo '<br> <span class="tags" class="tag-commentaire">Mon avis :</span> ' . $value['jeu_commentaire'];
        echo '</div>';

        echo '</div>';
    }
}


// LIBRAIRIE DE FONCTIONS : BDD DEV ---------------------------------------------------- 
function afficherListe2($mabd)
{
    $req = "SELECT * FROM dev";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<div id="gestion1" style="overflow-x:auto;">';
    echo '<table>' . "\n";
    echo '<thead><tr><th>Nom</th><th>Année</th><th>Directeur</th><th>Nationalité</th><th>Modifier</th><th>Supprimer</th></tr></thead>' . "\n";
    echo '<tbody>' . "\n";
    foreach ($resultat as $value) {
        echo '<tr>' . "\n";
        echo '<td>' . $value['dev_nom'] . '</td>' . "\n";
        echo '<td>' . $value['dev_annee'] . '</td>' . "\n";
        echo '<td>' . $value['dev_directeur'] . '</td>' . "\n";
        echo '<td>' . $value['dev_nationalite'] . '</td>' . "\n";
        echo '<td><a href="table2_update_form.php?num=' . $value['dev_id'] . '">Modifier</a></td>' . "\n";
        echo '<td><a href="table2_delete.php?num=' . $value['dev_id'] . '">Supprimer</a></td>' . "\n";
        echo '</tr>' . "\n";
        echo '</div>';
    }
    echo '</tbody>' . "\n";
    echo '</table>' . "\n";
}

function ajouterBD2($mabd, $nom, $annee, $directeur, $nationalite)
{
    $req = 'INSERT INTO dev (dev_nom, dev_annee, dev_directeur, dev_nationalite) VALUES ("' . $nom . '", ' . $annee . ', "' . $directeur . '", "' . $nationalite . '")';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le développeur ' . $nom . ' a été ajouté au catalogue.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
        die();
    }
}

function effacerBD2($mabd, $id)
{
    $req = 'DELETE FROM dev WHERE dev_id = ' . $id . '';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le dev ' . $id . ' a été supprimé du catalogue.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de la suppression.</p>' . "\n";
        die();
    }
}

function getBD2($mabd, $idAlbum)
{
    $req = 'SELECT * FROM dev WHERE dev_id=' . $idAlbum;
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // la fonction retourne le  tableau associatif 
    // contenant les champs et leurs valeurs
    return $resultat->fetch();
}

function modifierBD2(
    $mabd,
    $id,
    $nom,
    $annee,
    $directeur,
    $nationalite
) {
    $req = 'UPDATE dev 
                SET 
                dev_nom = "' . $nom . '",
    dev_annee = ' . $annee . ',
    dev_directeur  = "' . $directeur . '",
    dev_nationalite = "' . $nationalite . '" WHERE dev_id=' . $id;

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le développeur ' . $nom . ' a été modifiée.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de la modification.</p>' . "\n";
        die();
    }
}
