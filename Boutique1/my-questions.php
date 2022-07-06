<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/myQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/image.css">
<link rel="stylesheet" href="assets/style.css">
<body>
    
    <?php include 'includes/navbar.php'; ?>
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
                    Prix de vente : <?= $question['contenu']; ?>
                </p>
                <div class="image-article">
                <?= '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $question['bin'] ) . '" />'; ?>
                </div>
                <br><br>
                <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Acceder a l'article</a>
                <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier l'article</a>
                <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer l'article</a>
            </div>
        </div>
        <br>
         <?php
     }

    ?>
    
    </div>
    

</body>
</html>