<?php
    require_once('connexionBdd.php');

    // Recuperation de tous les eleves
    function getAllEleves() 
    {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("SELECT * FROM eleve");

        $statement->execute() or die(print_r($statement->errorInfo()));

        $result = $statement->fetchAll();

        $bdd = null;

        return $result;
    }

    // Recuperation d un eleve par id
    function getEleveById($mailCESI) {

        $bdd = connexionBdd();

        $statement = $bdd->prepare("SELECT * FROM eleve where mailCESI = :mailCESI");
        $statement->bindParam(':mailCESI', $mailCESI);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $result = $statement->fetch();

        $bdd = null;

        return $result;
    }

    // mise a jour d un eleve
    function updateEleve($mailCESI, $mdp, $nom, $prenom, $dateNaissance, $tel, $ville, $description, $lienLinkedin, $imgProfil, $idEntreprise, $idPromotion, $idTypeEleve, $idSexeEleve) {

        $bdd = connexionBdd();

        $statement = $bdd->prepare("UPDATE eleve SET
                                    mdp = :mdp,
                                    nom = :nom,
                                    prenom = :prenom,
                                    dateNaissance = :dateNaissance,
                                    tel = :tel,
                                    ville = :ville,
                                    description = :description,
                                    lienLinkedin = :lienLinkedin,
                                    imgProfil = :imgProfil,
                                    idEntreprise = :idEntreprise,
                                    idPromotion = :idPromotion
                                    idTypeEleve = :idTypeEleve,
                                    idSexeEleve = :idSexeEleve WHERE mailCESI = :mailCESI");

        $statement->bindParam(':mailCESI', $mailCESI);
        $statement->bindParam(':mdp', $mdp);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':dateNaissance', $dateNaissance);
        $statement->bindParam(':tel', $tel);
        $statement->bindParam(':ville', $ville);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':lienLinkedin', $lienLinkedin);
        $statement->bindParam(':imgProfil', $imgProfil);
        $statement->bindParam(':idEntreprise', $idEntreprise);
        $statement->bindParam(':idPromotion', $idPromotion);
        $statement->bindParam(':idTypeEleve', $idTypeEleve);
        $statement->bindParam(':idSexeEleve', $idSexeEleve);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $bdd = null;

        return true;
    }

    // Ajoute un eleve
    function createEleve($mailCESI, $mdp, $nom, $prenom, $dateNaissance, $tel, $ville, $description, $lienLinkedin, $imgProfil, $idEntreprise, $idPromotion, $idTypeEleve, $idSexeEleve) {

        $bdd = connexionBdd();

        $statement = $bdd->prepare("INSERT INTO eleve VALUES (:mailCESI,
                                    :mdp,
                                    :nom,
                                    :prenom,
                                    :dateNaissance,
                                    :tel,
                                    :ville,
                                    :description,
                                    :lienLinkedin,
                                    :imgProfil,
                                    :idEntreprise,
                                    :idPromotion
                                    :idTypeEleve,
                                    :idSexeEleve)");

        $statement->bindParam(':mailCESI', $mailCESI);
        $statement->bindParam(':mdp', $mdp);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':dateNaissance', $dateNaissance);
        $statement->bindParam(':tel', $tel);
        $statement->bindParam(':ville', $ville);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':lienLinkedin', $lienLinkedin);
        $statement->bindParam(':imgProfil', $imgProfil);
        $statement->bindParam(':idEntreprise', $idEntreprise);
        $statement->bindParam(':idPromotion', $idPromotion);
        $statement->bindParam(':idTypeEleve', $idTypeEleve);
        $statement->bindParam(':idSexeEleve', $idSexeEleve);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $bdd = null;

        return true;
    }

    function deleteEleve($mailCESI) {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("DELETE FROM eleve where mailCESI = :mailCESI");
        $statement->bindParam(':mailCESI', $mailCESI);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $bdd = null;

        return true;
    }
?>