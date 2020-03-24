<?php

/**
 * Import fichier
 */

require_once __DIR__.'/../modeles/connexionBdd.php';
require_once __DIR__.'/../modeles/EleveManager.php';
require_once __DIR__.'/../modeles/EntrepriseManager.php';
require_once __DIR__.'/../modeles/PromotionManager.php';
require_once __DIR__.'/../modeles/EnumTypeEleveManager.php';
require_once  __DIR__.'/../modeles/Managers.php';

/**
 * Routing
 */
if (isset($_POST['fonctionValeur'])) {
    switch ($_POST['fonctionValeur']) {
        case 'connexionClient':
            connexionClient();
            break;
        case 'continueCreationCompte':
            continueCreationCompte();
            break;
        case 'creationCompte':
            creationCompte();
            break;
        case 'deconnexion':
            deconnexion();
            break;
        case 'saveEleve':
            saveEleve();
            break;
        case 'uploadImgProfil':
            uploadImgProfil();
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
    $eleve = getEleveManager()->getEleveByMailCESI($email);
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

    $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $entreprise = new Entreprise(array(
        'designation' => $_POST['nomEntreprise'],
        'siteWeb' => null
    ));

    getEntrepriseManager()->createEntreprise($entreprise);
    $idEntreprise = getEntrepriseManager()->recupererIdDerniereEntreprise();

    $eleve = new Eleve(array(
        'mailCESI' => $_POST['mailCESI'],
        'mdp' => $mdp,
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'dateNaissance' => $_POST['dateNaissance'],
        'tel' => $_POST['tel'],
        'ville' => $_POST['ville'],
        'description' => $_POST['description'],
        'lienLinkedin' => null,
        'imgProfil' => null,
        'idEntreprise' => $idEntreprise->getIdEntreprise(),
        'idPromotion' => $_POST['idPromotion'],
        'idTypeEleve' => $_POST['idTypeEleve'],
        'idSexeEleve' => $_POST['idSexeEleve']
    ));
    
    getEleveManager()->createEleve($eleve);

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranetcesi/vues/connexion.php');
   
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

function infosEleve($identifiant) {
//On va chercher l'objet eleve
    $eleve = getEleveManager()->getEleveByMailCESI($identifiant);

    $entreprise = getEntrepriseManager()->getEntrepriseById($eleve->getIdEntreprise());

    return array(['eleve' => $eleve, 'entreprise' => $entreprise]);
}


function continueCreationCompte()
{
    $isExiste = true;
    $nom = $_POST['nom_creationEleve'];
    $prenom = $_POST['prenom_creationEleve'];
    $mailCesi = $_POST['email_creationEleve'];

    $nomDomaine = explode('@', $mailCesi);

    if ($nomDomaine[1] === 'viacesi.fr') {
        $eleve = getEleveManager()->getEleveByMailCesi($mailCesi);
        if (!$eleve) {
            $isExiste = false;
        }
    }
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($isExiste);
}

function saveEleve()
{
    // Récupération de l'eleve a save
    $mailCessi = $_POST['mail'];
    $eleve = getEleveManager()->getEleveByMailCESI($mailCessi);

    // Maj de l'eleve
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $ville = $_POST['villeEleve'];
    $description = $_POST['description'];
    $typeEleve = $_POST['typeEleve'];
    $sexe = $_POST['sexe'];

    $eleve->setNom(utf8_decode($nom));
    $eleve->setPrenom(utf8_decode($prenom));
    $eleve->setTel(utf8_decode($tel));
    $eleve->setVille(utf8_decode($ville));
    $eleve->setDescription(utf8_decode($description));
    $eleve->setIdTypeEleve($typeEleve);
    $eleve->setIdSexeEleve($sexe);

    getEleveManager()->updateEleve($eleve);

    // Maj de l'entreprise de leleve
    $nomEntreprise = $_POST['nomEntreprise'];

    $entreprise = getEntrepriseManager()->getEntrepriseById($eleve->getIdEntreprise());
    $entreprise->setDesignation(utf8_decode($nomEntreprise));
    
    getEntrepriseManager()->updateEntreprise($entreprise);

    header('Content-type: application/json');
    echo json_encode(true);
}

function uploadImgProfil() {
    $target_dir = '../uploads/imgProfil/';
    $target_file = $target_dir.uniqid();
    $uploadOk = 1;
    $imageFileType = pathinfo($_FILES["imgProfil"]["name"], PATHINFO_EXTENSION);
    $eleve = getEleveManager()->getEleveByMailCESI($_POST['mailCesi']);

    if (file_exists($target_file)) {
        header('HTTP/1.1 500 Internal Server Error');
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        header('HTTP/1.1 500 Internal Server Error');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgProfil"]["tmp_name"], $target_file.'.'.$imageFileType)) {

            // Supprime l'ancienne image si elle existe
            if($eleve->getImgProfil()) {
                if(file_exists(__DIR__.'/../uploads/imgProfil/'.$eleve->getImgProfil())) {
                    unlink(__DIR__.'/../uploads/imgProfil/'.$eleve->getImgProfil());
                }
            }   
            $eleve->setImgProfil(basename($target_file.'.'.$imageFileType));
            getEleveManager()->updateEleve($eleve);
            
            $imgProfil = base64_encode(file_get_contents(__DIR__ .'/../uploads/imgProfil/'.$eleve->getImgProfil()));

            echo json_encode(array(
                'imgProfil'=>$imgProfil,
                'imgType' => $imageFileType
            ));
        } else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
}

function allPromotion()
{
    return  getPromotionManager()->getAllPromotion();
}

function allTypeEleve()
{
    return getEnumTypeEleveManager()->getAllTypeEleve();
}