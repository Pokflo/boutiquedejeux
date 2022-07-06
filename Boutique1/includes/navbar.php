<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Vendre un jeu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-questions.php">Mes jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="confidentialité.php">confidentialité</a>
        </li>
        
        <?php
        if(!isset($_SESSION['auth'])){
          ?>
          <li class="nav-item">
          <a class="nav-link" href="signup.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Connexion</a>
        </li>
          <?php
        }
        ?>
        <?php 
        if(isset($_SESSION['auth'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="actions/users/logoutAction.php">Deconnexion</a>
          </li>
          <?php
        }
        ?>
      </ul>
      <?php 
        if(isset($_SESSION['auth'])){
          ?>

        <form method="GET">

        <div class="form-group row">

        <div class="col-8"> 
            <input type="search" name="search" class="form-control">
      </div>

        <div class="col-4">
            <button class="btn btn-secondary" type="submit">Rechercher</button>
      </div>

      </div>
        
      </form>
          <?php
        }
        ?>
    </div>
  </div>
</nav>