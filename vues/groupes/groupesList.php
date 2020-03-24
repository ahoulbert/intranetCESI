<?php

//On demarre la session
session_start();

// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['mail_cesi'])) {
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
$infosEleve = infosEleve($_SESSION['mail_cesi']);
?>

<!DOCTYPE html>
<html>

<head>
    <script src='../js/groupList.js'></script>
    <?php
    include_once(__DIR__ . "/../navBar.php");
    ?>
    <title>Groupes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/evenementList.css">
</head>

<body class="w3-theme-l5">

    <input type="hidden" id="mailCESI" value="<?php echo $_SESSION['mail_cesi']; ?>">


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
                            <button class="w3-button w3-block w3-theme w3-section" id="coming" onclick="changeGroupe(this.id, event);"><i class="fa fa-users"></i>&nbsp;Mes groupes</button>
                        </div>
                        <div class="w3-half">
                            <button class="w3-button w3-block w3-theme w3-section" id="past" onclick="changeGroupe(this.id, event);"><i class="fa fa-plus"></i>&nbsp;Groupes suggérés</button>
                        </div>
                        <div class="w3-half">
                            <button class="w3-button w3-block w3-theme w3-section" id="new" onClick="javascript:document.location.href='creationGroupe.php'"><i class="fa fa-plus-square"></i>&nbsp;Créer un groupe</button>
                        </div>
                    </div>
                </div>

                <div id="mesGroupes">
                    <input type="hidden" value="<?php echo $_SESSION['mail_cesi']; ?>" id="mail_cesi">
                    <?php
                    $mesGroupes = getAllGroupeByEleve($_SESSION['mail_cesi']);
                    // var_dump($mesGroupes);
                    if (!empty($mesGroupes)) {
                        foreach ($mesGroupes as $event) {

                            echo '<div class="w3-container w3-card w3-white w3-round w3-margin w3-center" id="my-group-' . $event->getIdGroupe() . '"><br>';
                            echo '<h4>' . utf8_encode($event->getNom()) . '</h4><hr class="w3-clear">';
                            echo '<span class="w3-left w3-opacity">' . utf8_encode($event->getDescription()) . '</span>';
                            echo '<div class="w3-right w3-section style="float:left;" id="mesBouttons-' . $event->getIdGroupe() . '">
                        <button class="w3-button  w3-theme" id="buttonAccess-' . $event->getIdGroupe() . '">Accéder</button>
                        <button class="w3-button  w3-theme" style="background-color: #f44336 !important;" onclick="updateGroupe(this.id, event)" id="quit-' . $event->getIdGroupe() . '">Quitter</button>
                                      </div>';
                            echo '<div class="dropdown w3-right w3-section style="float:left;" style="display:none;" id="btn-join-' . $event->getIdGroupe() . '">
                                <button class="w3-button w3-block w3-theme" onclick="updateGroupe(this.id, event)" id="join-' . $event->getIdGroupe() . '">Rejoindre</button>
                              </div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>

                <div id="GroupeSuggere" style="display: none;">
                    <?php
                    $eventsPast = getAllGroupeSuggest($_SESSION['mail_cesi']);

                    if (!empty($eventsPast)) {
                        foreach ($eventsPast as $event) {
                            echo '<div id="suggest-' . $event->getIdGroupe() . '" class="w3-container w3-card w3-white w3-round w3-margin w3-center"><br>';
                            echo '<h4>' . utf8_encode($event->getNom()) . '</h4><hr class="w3-clear">';
                            echo '<span class="w3-left w3-opacity">' . utf8_encode($event->getDescription()) . '</span>';
                            echo '<div class="dropdown w3-right w3-section style="float:left;" id="btn-join-' . $event->getIdGroupe() .'">
                                <button class="w3-button w3-block w3-theme" onclick="updateGroupe(this.id, event)" id="join-' . $event->getIdGroupe() . '">Rejoindre</button>
                              </div>';
                            echo '<div class="w3-right w3-section style="float:left;" style="display:none;" id="mesBouttons-' . $event->getIdGroupe() . '">
                                    <button class="w3-button  w3-theme" id="buttonAccess-' . $event->getIdGroupe() . '">Accéder</button>
                                    <button class="w3-button  w3-theme" style="background-color: #f44336 !important;" onclick="updateGroupe(this.id, event)" id="quit-' . $event->getIdGroupe() . '">Quitter</button>
                                </div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
       
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


    <!--<script src='../js/index.js'></script>-->
</body>

</html>