<?php require('actions/users/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<head>
  <link rel="stylesheet" href="assets/body.css">
  <link rel="stylesheet" href="../assets/Form.css">
</head>  
<body>
<br><br>
    <form class="container" method="POST">

    <?php if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>';} ?>

    <div class="container">
      <div class="row100">
     <div class="col">
        <p>Pseudo</p>
         <div class="inputBox">
             <input type="text" name="pseudo" required="required">
             <span class="text">Pseudo</span>
             <span class="line"></span>
   </div>
       </div>
      <div class="row100">
     <div class="col">
     <p>Mot de passe</p>
         <div class="inputBox">
             <input type="text" name="password" required="required">
             <span class="text">Password</span>
             <span class="line"></span>
   </div>
       </div>
       <div class="row100">
    <div class="col">
   <input type="submit" name="validate" value="Connexion">
   <br><br>
   <div>
       <a href="signup.php">Je n'ai pas de compte, je m'inscris</a>
</div>
   <br>
   <a href="index.php">Retour a l'index</a>
    </div>
    </div>
    </form>
    </div>
</body>
</html>