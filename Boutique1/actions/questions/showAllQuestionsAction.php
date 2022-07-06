<?php

require('actions/database.php');

// Recuperer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, contenu, bin, pseudo_auteur, date_publication FROM articles ORDER BY id DESC LIMIT 0,5');

// Verifier si une recherche a été rentrée par l'utilisateur
if(isset($_GET['search']) && !empty($_GET['search'])){

    // La recherche
    $usersSearch = $_GET['search'];

    // Recuperer toutes les questions qui correspondent a la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, contenu, bin, pseudo_auteur, date_publication FROM articles WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

} 