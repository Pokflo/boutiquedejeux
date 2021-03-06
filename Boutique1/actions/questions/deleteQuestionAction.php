<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('Location : ../../login.php');
}

require('../database.php');

// Sert a verifier si la variable est declarer
if(isset($_GET['id']) && !empty($_GET['id'])){
    
    // l'id de l'article en parametre
    $idOfTheQuestion = $_GET['id'];

    // Verifier si l'article existe
    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM articles WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        // Recuperer les infos de l'article
        $questionsInfos = $checkIfQuestionExists->fetch();
        if($questionsInfos['id_auteur'] == $_SESSION['id']){

            // Supprimer l'article en fonction de son id rentré en paramétre
            $deleteThisQuestion = $bdd->prepare('DELETE FROM articles WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            // Rediriger l'utilisateur vers ses jeux
            header('Location: ../../my-questions.php');

        } else {
            echo "Vous n'avez pas le droit de supprimer un jeu qui ne vous appartient pas !";
        }

    } else {
        echo "Aucun jeu n'a été trouvée";
    }

} else {
    echo "Aucun jeu n'a été trouvée";
}