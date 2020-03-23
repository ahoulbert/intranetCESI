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
  <title>Evenements</title>
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
                <div id="newGroupe">
                    <input type="hidden" value="<?php echo $_SESSION['mail_cesi']; ?>" id="mail_cesi">
                    <div class="w3-container w3-card w3-white w3-round w3-margin w3-center"><br>
                    
                        <h4>Créer un nouvel événement</h4>
                        <hr class="w3-clear">
                        <form action="../../controleurs/GroupeControleur.php" method="POST">
                        <input type="hidden" name="fonctionValeur" value="creationGroupe" />
                        <div class="form-row m-b-55">
                            <div class="name" style="font-size: 15px !important;" >Informations</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input placeholder="Titre de l'événement" style="font-size: 13px !important;" class="input--style-5" type="text" value="" required name="nom" />
                                            <input placeholder="Description" style="font-size: 13px !important;" class="input--style-5" type="text" value="" required name="nom" />

                                        </div>
                                      <br/><br/>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                           <input placeholder="Lieu de l'évenement" style="font-size: 13px !important;" class="input--style-5" type="text" value="" required name="nom" />
                                            <input placeholder = "date"style="font-size: 13px !important;" class="input--style-5" type="date" value="" required name="nom" />
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-right w3-section" style=" float:left;">
                        <button class="w3-button  w3-theme" style="background-color: #B2B7C0 !important;"  src="./intranetcesi/vues/evenement/creationEvenement.php" id="button">Retour</button>
                            <button class="w3-button  w3-theme" id="button-" type="submit" >Créer</button>
                            
                        </div>
                        </form>
                        
                    </div>
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

  <script src='../js/groupList.js'></script>
  <!--<script src='../js/index.js'></script>-->
</body>
</html>
