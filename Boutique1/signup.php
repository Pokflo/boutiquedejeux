<?php 
require('actions/users/signupAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<head>
  <link rel="stylesheet" href="assets/body.css">
  <link rel="stylesheet" href="assets/Form.css">
  <link rel="stylesheet" href="assets/footer.css">
  <link rel="stylesheet" href="assets/glow.css">
</head>
<?php include 'includes/navbar.php'; ?>  
<body>
<div class="glow">
  <hr>
  <h1>Inscription</h1>
  <hr>
</div>
    <?php if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>';} ?>
    
    <div class='container'>
        <form method="POST" class="rounded">
  <div class="form-floating m-3">
    <label for="exampleFormControlInput1">Nom</label>
    <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
  </div>
  <div class="form-floating m-3">
    <label for="exampleFormControlInput1">Prénom</label>
    <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="Prénom">
  </div>
  <div class="form-floating m-3">
    <label for="exampleFormControlInput1">Adresse</label>
    <input type="text" name="adress" class="form-control" id="exampleFormControlInput1" placeholder="Adresse">
  </div>
  <div class="form-floating m-3">
    <label for="exampleFormControlInput1">Pseudo</label>
    <input type="text" name="pseudo" class="form-control" id="exampleFormControlInput1" placeholder="Pseudo">
  </div>
  <div class="form-floating m-3">
    <label for="exampleFormControlInput1">E-mail</label>
    <input type="email" name="e-mail" class="form-control" id="exampleFormControlInput1" placeholder="E-mail">
  </div>
  <div class="form-floating m-3">
    <label for="exampleFormControlInput1">Mot de passe</label>
    <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Mot de passe">
  </div><br>
  
  <div>
  <button type="submit" name="validate" class="btn btn-danger">Inscription</button>
  </div>
  
</form> 
    </div>
    <?php include 'includes/footer.php';?>
</body>
</html>

