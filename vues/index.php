<?php
  //On demarre la session
  session_start();

  // On teste si la variable de session existe et contient une valeur
  if(empty($_SESSION['mail_cesi'])) 
  {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
    exit();
  }
  //Fichiers inclut
  require_once '../controleurs/EleveControlleur.php';
  require_once '../controleurs/TagControleur.php';
  require_once '../controleurs/GroupeControleur.php';
  //Infos eleves
  $infosEleve=infosEleve($_SESSION['mail_cesi']);
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include_once("navBar.php");
  ?>
  <title>Intranet CESI</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body class="w3-theme-l5">
  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <?php
          include_once('modules/profile.php');
        ?>
        <br>
        <!-- Accordion -->
        <?php
          include_once('modules/accordeon.php');
        ?>
        <br>
        <?php
          include_once('modules/tag.php');
        ?>
        <br>
        <!-- End Left Column -->
      </div>

      <!-- Middle Column -->
      <div class="w3-col m7">
        <div class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card w3-round w3-white">
              <div class="w3-container w3-padding">
                <p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
                <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Publier</button>
              </div>
            </div>
          </div>
        </div>

        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">1 min</span>
          <h4>Maxou</h4><br>
          <hr class="w3-clear">
          <h1>Antoine</h1>
          <p>Antoine grosse tarlouze rousse</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
            </div>
          </div>
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
        </div>

        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          <img src="https://www.w3schools.com/w3images/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">16 min</span>
          <h4>Jane Doe</h4><br>
          <hr class="w3-clear">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
        </div>

        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          <img src="https://www.w3schools.com/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">32 min</span>
          <h4>Angie Jane</h4><br>
          <hr class="w3-clear">
          <p>Have you seen this?</p>
          <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
        </div>

        <!-- End Middle Column -->
      </div>

      <!-- Right Column -->
      <div class="w3-col m2">
        <?php
          include_once('modules/evenement.php');
        ?>
        <br>

        <?php
          include_once('modules/amitier.php');
        ?>
        <br>
        <!-- End Right Column -->
      </div>

      <!-- End Grid -->
    </div>

    <!-- End Page Container -->
  </div>
  <br>

  <!-- Footer -->
  <?php
    include_once('ressources/footer.php');
  ?>

  <!-- Import du JS perso -->
  <script src="js/index.js"></script>

</body>

</html>