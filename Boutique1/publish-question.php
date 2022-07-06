<?php 
      require('actions/users/securityAction.php');
      require('actions/questions/publishQuestionAction.php');    
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

<?php include 'includes/navbar.php'; ?>
    <br><br>
    <form class="container" method="POST" enctype="multipart/form-data">

    <?php if(
      isset($errorMsg))
      {
        echo '<p>'.$errorMsg.'</p>';
      } elseif(isset($successMsg)) 
      {
        echo '<p>'.$successMsg.'</p>';
      }
      ?>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" name="title" required="required">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Description de l'article</label>
        <textarea class="form-control" name="description" required="required"></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prix de vente</label>
        <input type="number" class="form-control" name="content" required="required">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Photo</label>
        <input type="file" class="form-control" name="picture" required="required">
      </div>
        <button type="submit" class="btn btn-primary" name="validate">Publier l'article</button>
    </form>
</body>
</html>