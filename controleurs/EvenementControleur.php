<?php

/**
 * Import fichier
 */
require_once __DIR__.'/../modeles/connexionBdd.php';
require_once __DIR__.'/../modeles/EvenementManager.php';
require_once __DIR__.'/../modeles/EleveEvenementManager.php';

/**
 * Managers
 */
function getEvenementManager() {
    return new EvenementManager(connexionBdd());
}

function getEleveEvenementManager() {
    return new EleveEvenementManager(connexionBdd());
}

/**
 * Routing
 */
if(isset($_POST['fonctionValeur'])){
    switch ($_POST['fonctionValeur']) {
        case 'eventPast':
            getAllEvenementAVenir();
            break;
        case 'eventPast':
            getAllEvenementPasses();
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
?>