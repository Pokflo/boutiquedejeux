<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/myQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/image.css">
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/footer.css">
<link rel="stylesheet" href="assets/glow.css">
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="glow">
    <hr>
    <h1>Mes jeux</h1>
    <hr>
    </div>
    
    <br><br>
    <div class="container">

    <?php 

     while($question = $getAllMyQuestions->fetch()){
         ?>
         <div class="card">
                <h5 class="card-header">
                <a href="article.php?id=<?= $question['id']; ?>">
                <?= $question['titre']; ?></a>
                </h5>
            <div class="card-body">
                <p class="card-text">
                    <?= $question['description']; ?>
                </p>
                <p class="card-text">
                    Prix de vente : <?= $question['contenu'];  ?> €
                </p>
                <div class="image-article">
                <?= '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $question['bin'] ) . '" />'; ?>
                </div>
                <br><br>
                <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Acceder a l'article</a><br><br>

                <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-secondary">Modifier l'article</a><br><br>

                <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer l'article</a>
            </div>
        </div>
        <br>
         <?php
     }

    ?>
    
    </div>
    
<?php include 'includes/footer.php';?>
</body>
</html>