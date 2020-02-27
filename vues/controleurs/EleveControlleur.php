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
    $isCompteExiste=false;
    //Récupération des champs du formulaire
    $email = $_POST['email_connexion'];
    $mdp = $_POST['mdp_connexion'];
    
    //On va chercher l'objet eleve
    $bdd=connexionBdd();
    $manager=new EleveManager($bdd);
    $eleve=$manager->getEleveByMailCESI($email);
    //On récupère le mot de passe de l'élève
    $verifMdp=$eleve->getMdp();
    
    $bdd=null;
    
    return password_verify($mdp, $verifMdp);
}

function creationCompte()
{
    //On récupère le champ du formulaire
    $email=$_POST['email_creationEleve'];
    $mdp = $_POST['mdp_creationEleve'];
    $nom = $_POST['nom_creationEleve'];
    $prenom = $_POST['prenom_creationEleve'];
    
    //On hash le mot de passe
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
    
    //On appelle le manager 
    $bdd=connexionBdd();
    $manager=new EleveManger($bdd);
    $eleve=new Eleve();
    //Setter Eleve remplissage des champs pour hydrater l'objet
    $eleve->setMailCESI($email);
    $eleve->setMdp($mdp);
    $eleve->setNom($nom);
    $eleve->setPrenom($prenom);
    $eleve->setDateNaissance('1999-04-11');
    
    $eleve=$manager->setcreateEleve($eleve);
}
