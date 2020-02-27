<?php

/**
 * Import fichier
 */
require_once '../modeles/connexionBdd.php';
require_once '../modeles/EleveManager.php';

/**
 * Routing
 */
switch ($_POST['fonctionValeur']) {
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
function connexionClient() {
    $isCompteExiste = false;
    //R�cup�ration des champs du formulaire
    $email = $_POST['email_connexion'];
    $mdp = $_POST['mdp_connexion'];

    //On va chercher l'objet eleve
    $bdd = connexionBdd();
    $manager = new EleveManager($bdd);
    $eleve = $manager->getEleveByMailCESI($email);
    //Si un �l�ve existe avec cette adresse mail alors
    if ($eleve !== false) {
        //On r�cup�re son mot de passe de la base de donn�es
        $verifMdp = $eleve->getMdp();
        //Et on v�rifie si son mot de passe est correct
        $isCompteExiste = password_verify($mdp, $verifMdp);
    }
    //On ferme la base de donn�es
    $bdd = null;

    if ($isCompteExiste) {
        session_start();
        $_SESSION['mail_cesi'] = $email;
    }
    //On retourne un booleen avec true si l'identifiant et le mot de passe sont bon et false si il y' a eu un probl�me dans la connexion
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($isCompteExiste);
}

function creationCompte() {
    //On r�cup�re le champ du formulaire
    $email = $_POST['email_creationEleve'];
    $mdp = $_POST['mdp_creationEleve'];
    $nom = $_POST['nom_creationEleve'];
    $prenom = $_POST['prenom_creationEleve'];

    //On hash le mot de passe
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    //On appelle le manager 
    $bdd = connexionBdd();
    $manager = new EleveManger($bdd);
    $eleve = new Eleve();
    //Setter Eleve remplissage des champs pour hydrater l'objet
    $eleve->setMailCESI($email);
    $eleve->setMdp($mdp);
    $eleve->setNom($nom);
    $eleve->setPrenom($prenom);
    $eleve->setDateNaissance('1999-04-11');

    $eleve = $manager->setcreateEleve($eleve);
}
