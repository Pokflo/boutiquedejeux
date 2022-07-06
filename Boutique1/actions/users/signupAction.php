<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    // Verifier si l'user a bien completer tous les champs !
    if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['adress']) && !empty($_POST['city']) && !empty($_POST['postal_code']) && !empty($_POST['password'])){

        // Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_adress = htmlspecialchars($_POST['adress']);
        $user_city = htmlspecialchars($_POST['city']);
        $user_postal_code = htmlspecialchars($_POST['postal_code']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Verifier si l'user existe deja
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){

            // Inserer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, adresse, ville, code_postal, mdp)VALUES(?, ?, ?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_adress, $user_city, $user_postal_code, $user_password));

            // Récuperer les infos de l'utilisateur (surtout l'id)
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom, adresse, ville, code_postal FROM users WHERE nom = ? && prenom = ? && pseudo = ? && adresse = ? && ville = ? && code_postal = ?');
            $getInfosOfThisUserReq->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_adress, $user_city, $user_postal_code));

            $userInfos = $getInfosOfThisUserReq->fetch();
            
            // Authentifier l'utilsateur sur le site et récuperer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['adress'] = $userInfos['adresse'];
            $_SESSION['city'] = $userInfos['ville'];
            $_SESSION['postal_code'] = $userInfos['code_postal'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            // Redirection sur index.php
            header('Location: index.php');

        } else {
            $errorMsg = "L'utilisateur existe deja";
        }

    } else {
        $errorMsg = "Veuillez completer tous les champs...";
    }
}