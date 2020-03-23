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
  require_once '../../controleurs/EleveControlleur.php';
  require_once '../../controleurs/TagControleur.php';
  require_once '../../controleurs/GroupeControleur.php';
  require_once '../../controleurs/EvenementControleur.php';

  //Infos eleves
  $infosEleve=infosEleve($_SESSION['mail_cesi']);
?>

<!DOCTYPE html>
<html>

<head>
  <?php
    include_once(__DIR__."/../navBar.php");
  ?>
  <title>Évenements</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/evenementList.css">
</head>

<body class="w3-theme-l5">
  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <?php
          include_once('../modules/profile.php');
        ?>
        <br>
        <!-- Accordion -->
        <?php
          include_once('../modules/accordeon.php');
        ?>
        <br>
        <?php
          include_once('../modules/tag.php');
        ?>
        <br>
        <!-- End Left Column -->
      </div>

      <!-- Middle Column -->
      <div class="w3-col m7">

        <div class="w3-container w3-card w3-white w3-round w3-margin w3-center" style="margin-top:0px!important">
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-theme w3-section" id="coming" onclick="changeEvents(this.id, event);"><i class="fa fa-calendar-check-o"></i>&nbsp;À venir</button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-theme w3-section" id="past" onclick="changeEvents(this.id, event)"><i class="fa fa-hourglass-end"></i>&nbsp;Passés</button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-theme w3-section" id="new" onClick="javascript:document.location.href='CreationEvenement.php'"><i class="fa fa-calendar"></i>&nbsp;Créer un événement</button>
            </div>
          </div>
        </div>

        <div id="eventComing">
          <input type="hidden" value="<?php echo $_SESSION['mail_cesi']; ?>" id="mail_cesi">
          <?php
            $eventsComing = getAllEvenementAVenir();

            if(!empty($eventsComing)) 
            {
              foreach($eventsComing as $event)
              {
                if($event->estInterese == 0)
                {
                  $estInterese = 'Pas intéressé(e)';
                } else {
                  $estInterese = 'Intéressé(e)';
                }

                echo '<div class="w3-container w3-card w3-white w3-round w3-margin w3-center"><br>';
                echo '<h4>'.utf8_encode($event->getTitre()).'</h4><hr class="w3-clear">';
                echo '<span class="w3-left w3-opacity">'.date_format($event->getDate(), 'd-M-Y').' - '.utf8_encode($event->getDescription()).' - '.utf8_encode($event->getLieu()).'</span>';
                echo '<div class="dropdown w3-right w3-section style="float:left;">
                        <button class="w3-button w3-block w3-theme" id="button-'.$event->getIdEvenement().'">'.$estInterese.'</button>
                        <div class="dropdown-content" style="left:0;">
                          <a id="'.$event->getIdEvenement().'-1" href="#" onclick="updateInteresement(this.id, event)">Intéressé(e)</a>
                          <a id="'.$event->getIdEvenement().'-0" href="#" onclick="updateInteresement(this.id, event)">Pas intéressé(e)</a>
                        </div>
                      </div>';
                echo '</div>';
              }
            }
          ?>
        </div>

        

        <div id="eventPast" style="display: none;">
          <?php
            $eventsPast = getAllEvenementPasses();

            if(!empty($eventsPast)) 
            {
              foreach($eventsPast as $event)
              {
                echo '<div class="w3-container w3-card w3-white w3-round w3-margin w3-center"><br>';
                echo '<h4>'.utf8_encode($event->getTitre()).'</h4><hr class="w3-clear">';
                echo '<span class="w3-left w3-opacity">'.date_format($event->getDate(), 'd-M-Y').' - '.utf8_encode($event->getDescription()).' - '.utf8_encode($event->getLieu()).'</span>';
                echo '</div>';
              }
            }
          ?>
        </div>
        <!--
        <div class="w3-container w3-card w3-white w3-round w3-margin w3-center"><br>
        </div>
        -->
        <!-- End Middle Column -->
      </div>

      <!-- Right Column -->
      <div class="w3-col m2">

        <?php
          include_once('../modules/amitier.php');
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
    include_once('../ressources/footer.php');
  ?>

  <script src='../js/evenementList.js'></script>
  <!--<script src='../js/index.js'></script>-->
</body>
</html>
