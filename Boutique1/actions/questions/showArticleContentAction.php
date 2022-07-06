<?php

require('actions/database.php');

// Verifier si l'id de l'article est rentrée dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){

    // Recupérer l'identifiant de l'article
    $idOfTheQuestion = $_GET['id'];

    // Verifier si l'article existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0) {

        // Récupérer toutes les données de l'article
        $questionsInfos = $checkIfQuestionExists->fetch();


        // Stocker les données de l'article dans des variables
        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];

    } else {
        $errorMsg = "Aucun article n'a été trouvée";
    }

} else {
    $errorMsg = "Aucun article n'a été trouvée";
}