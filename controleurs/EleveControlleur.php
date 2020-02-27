<?php

/**
 * Import fichier
 */
require_once '../modeles/connexionBdd.php';
require_once '../modeles/EleveManager.php';
require_once '../modeles/EntrepriseManager.php';

/**
 * Routing
 */
if(isset($_POST['fonctionValeur'])){
    switch ($_POST['fonctionValeur']) {
    case 'connexionClient':
        connexionClient();
        break;
    case 'creationCompte':
        creationCompte();
        break;
    case 'deconnexion':
        deconnexion();
        break;
}
} 


/**
 * Function 
 */
//Function avec le ajax pour tester la connexion
function connexionClient() {
    $isCompteExiste = false;
    //Récupération des champs du formulaire
    $email = $_POST['email_connexion'];
    $mdp = $_POST['mdp_connexion'];

    //On va chercher l'objet eleve
    $bdd = connexionBdd();
    $manager = new EleveManager($bdd);
    $eleve = $manager->getEleveByMailCESI($email);
    //Si un élève existe avec cette adresse mail alors
    if ($eleve !== false) {
        //On récupère son mot de passe de la base de données
        $verifMdp = $eleve->getMdp();
        //Et on vérifie si son mot de passe est correct
        $isCompteExiste = password_verify($mdp, $verifMdp);
    }
    //On ferme la base de données
    $bdd = null;

    if ($isCompteExiste) {
        session_start();
        $_SESSION['mail_cesi'] = $email;
    }
    //On retourne un booleen avec true si l'identifiant et le mot de passe sont bon et false si il y' a eu un problème dans la connexion
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($isCompteExiste);
}

function creationCompte() {
    //On récupère le champ du formulaire
    $email = $_POST['email_creationEleve'];
    $mdp = $_POST['mdp_creationEleve'];
    $nom = $_POST['nom_creationEleve'];
    $prenom = $_POST['prenom_creationEleve'];

    //On hash le mot de passe
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    //On appelle le manager 
    $bdd = connexionBdd();
    $manager = new EleveManager($bdd);
    $eleve = new Eleve();
    //Setter Eleve remplissage des champs pour hydrater l'objet
    $eleve->setMailCESI($email);
    $eleve->setMdp($mdp);
    $eleve->setNom($nom);
    $eleve->setPrenom($prenom);
    $eleve->setDateNaissance('1999-04-11');

    $eleve = $manager->setcreateEleve($eleve);
}

function deconnexion() {
  // Démarrage ou restauration de la session
  session_start();
  // Réinitialisation du tableau de session
  // On le vide intégralement
  $_SESSION = array();
  // Destruction de la session
  session_destroy();
  // Destruction du tableau de session
  unset($_SESSION);
  //Redirection vers la page de connexion
  header('Location: ../vues/connexion.php');
}

function infosEleve($identifiant)
{
//On va chercher l'objet eleve
$bdd = connexionBdd();
$manager = new EleveManager($bdd);
$eleve = $manager->getEleveByMailCESI($identifiant);

$manager = new EntrepriseManager($bdd);
$entreprise = $manager->getEntrepriseById($eleve->getIdEntreprise());

return array(['eleve' => $eleve, 'entreprise' => $entreprise]);
}