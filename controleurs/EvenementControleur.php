<?php

/**
 * Import fichier
 */
require_once  __DIR__.'/../modeles/Managers.php';

/**
 * Routing
 */
if(isset($_POST['fonctionValeur'])){
    switch ($_POST['fonctionValeur']) {
        case 'updateInteresement':
            updateInteresement();
            break;
    }
} 


/**
 * Function 
 */
function getAllEvenementAVenir() {
    $events = getEvenementManager()->getAllEvenementAVenir();
    
    if(!empty($events)) {
        foreach($events as $event) {
            $eleveEvenement = getEleveEvenementManager()->getEleveEvenementById($event->getIdEvenement(), $_SESSION['mail_cesi']);

            $event->estInterese = (int) $eleveEvenement->getEstInterese();
        }
    }

    return $events;
}

function getAllEvenementPasses() {    
    $events = getEvenementManager()->getAllEvenementPasses();
    
    if(!empty($events)) {
        foreach($events as $event) {
            $eleveEvenement = getEleveEvenementManager()->getEleveEvenementById($event->getIdEvenement(), $_SESSION['mail_cesi']);

            $event->estInterese = (int) $eleveEvenement->getEstInterese();
        }
    }

    return $events;
}

function updateInteresement() {
    $idEvent = $_POST['idEvent'];
    $estInterese = $_POST['estInterese'];
    $mailCESI = $_POST['mail_cesi'];
    $updateStatut = false;

    $eleveEvenement = getEleveEvenementManager()->getEleveEvenementById($idEvent, $mailCESI);
    
    if($eleveEvenement) {
        $eleveEvenement->setEstInterese($estInterese);

        getEleveEvenementManager()->updateEleveEvenement($eleveEvenement);

        $updateStatut = true;
    }

    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($updateStatut);
}
?>