<?php
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, titre, description, contenu, type_image, bin FROM articles WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));