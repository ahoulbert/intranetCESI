<?php
/**
 * Import fichier
 */
require_once '../modeles/connexionBdd.php';
require_once '../modeles/EleveManager.php';

/**
 * Routing
 */
switch ($_POST['fonctionValeur']){
    case 'connexionClient':
        connexionClient();
        break;
    case 'creationCompte':
        creationCompte();
        break;
}

/**
 * Function 
 */
//Function avec le ajax pour tester la connexion
function connexionClient() 
{
    $email = $_POST['email_connexion'];
    $mdp = $_POST['mdp_connexion'];

    return requeteConnexionClient($email, $mdp);
}

function creationCompte()
{
    echo 'Ceci est la page creationCompte';
    //Ceci est la fonction pour créer un compte Eleve
}
