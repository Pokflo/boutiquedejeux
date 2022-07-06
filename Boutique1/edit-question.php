<?php 
require('actions/users/securityAction.php');
require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>

<br><br>
<div class="container">
<?php if(
      isset($errorMsg)){echo '<p>'.$errorMsg.'</p>'; } ?>
      
      <?php 
        if(isset($question_content)){
            ?>
            <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de l'objet'</label>
                <input type="text" class="form-control" name="title" value="<?= $question_title; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description de l'objet</label>
                <textarea class="form-control" name="description"><?= $question_description; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix de vente</label>
                <input class="form-control" type="number" name="content" value="<?= $question_content; ?>">
            </div>
                
            <div class="mb-3">    
                <label for="exampleInputEmail1" class="form-label">Photo</label>
                <input type="file" class="form-control" name="picture">
            </div>  
                <div>      
            <?= '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $question_image ) . '" />'; ?>
                </div>
            <br><br>
                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
            </form>
            </div> 
            <?php
        }
      ?>          
</body>
</html>