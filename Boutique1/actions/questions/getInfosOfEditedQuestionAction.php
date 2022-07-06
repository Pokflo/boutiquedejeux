<?php

require('actions/database.php');

// Verifier si l'id de l'article est bien passer en parametre dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    // Verifier si l'article existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){


        // Recuperer les données de l'article
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']){

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];
            $question_image = $questionInfos['bin'];

            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);

        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette article !";
        }

    } else {
        $errorMsg = "Aucun article n'a été trouvée";
    }

} else {
    $errorMsg = "Aucun article n'a été trouvée";
}