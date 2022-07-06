<?php
session_start(); 
require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/image.css">
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/footer.css">
<body>
<?php include 'includes/navbar.php'; ?>
<br><br>

<div class="container">
    <?php 
    while($question = $getAllQuestions->fetch()){
        ?>
        <div class="card">
            <div class="card-header">
           <a href="article.php?id=<?= $question['id']; ?>">
                <?= $question['titre']; ?></a>
            </div>
            <div class="card-body">
            <?= $question['description']; ?>
            </div>
            <div class="card-body">
            <p> Prix de vente : <?= $question['contenu']; ?></p>
            </div>
            <div class="image-article">
                <?= '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $question['bin'] ) . '" />'; ?>
                </div>
                <br>
                <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Acceder a l'article</a>
                <br>
    
            <div class="card-footer">
            Publié par <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication']; ?>
            </div>
        </div>
            
    <?php
    }
    ?>
</div>
<?php include 'includes/footer.php';?>
</body>
</html>