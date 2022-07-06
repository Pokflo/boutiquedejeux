<?php 
require('actions/users/securityAction.php');
require('actions/questions/showArticleContentAction.php');
require('actions/questions/postAnswerAction.php');
require('actions/questions/showAllAnswersOfQuestionAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>


        <?php include 'includes/navbar.php'; ?>
        <br><br>
        <div class="container">
            <?php
                if(isset($errorMsg)){
                    echo $errorMsg;
                }

                if(isset($question_publication_date) && ($_SESSION['auth'])){
                ?>
                    <section class="show-content">
                    
                        <h1>Nom du jeu :</h1>
                        <h3>
                            <?= '<br>'.$question_title; ?>
                        </h3>
                        <hr>
                        <p>
                            Prix de vente :<br>
                            <?= $question_content;?> Є
                        <p>
                        <hr>
                        <small>
                            
                            <?= 'Utilisateur :'.' '.$question_pseudo_author .'<br>'. ' Mis en ligne le : ' . $question_publication_date; ?>
                        </small>
                    </section>
                    <br>
                    <section class="show-answers">

                        <form class="form-group" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Commentaire :</label>
                                <textarea name="answer"class="form-control"></textarea>
                                <br>
                                <button class="btn btn-primary" type="submit" name="validate">Poster</button>
                            </div>
                        </form>

                        <?php 
                            while($answer = $getAllAnswersOfThisQuestion->fetch()){
                              ?>
                              <div class="card">
                                  <div class="card-header">
                                      <?= $answer['pseudo_auteur']; ?>
                                  </div>
                                  <div class="card-body">
                                      <?= $answer['contenu'];?>
                                  </div>
                              </div>
                              <?php
                            }
                        ?>


                    </section>

                <?php
                }
            ?>
            

        </div>

</body>
</html>