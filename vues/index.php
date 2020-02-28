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
//Infos eleves
$infosEleve=infosEleve($_SESSION['mail_cesi']);
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include_once("navBar.php");
  ?>
  <title>Intranet du CESI</title>
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
        <!-- Profile -->
        <div class="w3-card w3-round w3-white">
          <div class="w3-container">
            <h4 class="w3-center"><?php echo $infosEleve['0']['eleve']->getPrenom(); ?> <?php echo $infosEleve['0']['eleve']->getNom(); ?> </h4>
            <p class="w3-center"><img src="images/jul.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
            <hr>
            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo date_format($infosEleve['0']['eleve']->getDateNaissance(), 'd-M-Y'); ?></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $infosEleve['0']['eleve']->getVille(); ?></p>
            <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo$infosEleve['0']['entreprise']->getDesignation(); ?></p>
          </div>
        </div>
        
        <br>
        <!-- Accordion -->
        <div class="w3-card w3-round">
          <div class="w3-white">
            <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Mes groupes</button>
            <div id="Demo1" class="w3-hide w3-container">
              <p>Some text..</p>
            </div>
            <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Mes événements</button>
            <div id="Demo2" class="w3-hide w3-container">
              <p>Some other text..</p>
            </div>
            <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Mes photos</button>
            <div id="Demo3" class="w3-hide w3-container">
              <div class="w3-row-padding">
                <br>
                <div class="w3-half">
                  <img src="https://www.w3schools.com/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="https://www.w3schools.com/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="https://www.w3schools.com/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="https://www.w3schools.com/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>

        <!-- Interests -->
        <div class="w3-card w3-round w3-white w3-hide-small">
          <div class="w3-container">
            <p>Tags</p>
            <p>
              <span class="w3-tag w3-small w3-theme-d5">News</span>
              <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
              <span class="w3-tag w3-small w3-theme-d3">Labels</span>
              <span class="w3-tag w3-small w3-theme-d2">Games</span>
              <span class="w3-tag w3-small w3-theme-d1">Friends</span>
              <span class="w3-tag w3-small w3-theme">Games</span>
              <span class="w3-tag w3-small w3-theme-l1">Friends</span>
              <span class="w3-tag w3-small w3-theme-l2">Food</span>
              <span class="w3-tag w3-small w3-theme-l3">Design</span>
              <span class="w3-tag w3-small w3-theme-l4">Art</span>
              <span class="w3-tag w3-small w3-theme-l5">Photos</span>
            </p>
          </div>
        </div>
        <br>

        <!-- Alert Box -->
        <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
          <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
            <i class="fa fa-remove"></i>
          </span>
          <p><strong>Hey!</strong></p>
          <p>People are looking at your profile. Find out who.</p>
        </div>

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
          <h4>John Doe</h4><br>
          <hr class="w3-clear">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
        <div class="w3-card w3-round w3-white w3-center">
          <div class="w3-container">
            <p>Prochain événement :</p>
            <img src="https://www.w3schools.com/w3images/forest.jpg" alt="Forest" style="width:100%;">
            <p><strong>Holiday</strong></p>
            <p>Friday 15:00</p>
            <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
          </div>
        </div>
        <br>

        <div class="w3-card w3-round w3-white w3-center">
          <div class="w3-container">
            <p>Demande d'ami</p>
            <img src="https://www.w3schools.com/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
            <span>Jane Doe</span>
            <div class="w3-row w3-opacity">
              <div class="w3-half">
                <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
              </div>
              <div class="w3-half">
                <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
          <p>ADS</p>
        </div>
        <br>

        <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
          <p><i class="fa fa-bug w3-xxlarge"></i></p>
        </div>

        <!-- End Right Column -->
      </div>

      <!-- End Grid -->
    </div>

    <!-- End Page Container -->
  </div>
  <br>

  <!-- Footer -->
  <footer class="w3-container w3-theme-d3 w3-padding-16">
    <h5>Footer</h5>
  </footer>

  <footer class="w3-container w3-theme-d5">
    <p>Site réalisé par MCMA Dev <img style="width:20px;height:auto;" src="images/logoMCMA.svg" /></p>
  </footer>

  <script>
    // Accordion
    function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
      } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
          x.previousElementSibling.className.replace(" w3-theme-d1", "");
      }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

</body>

</html>