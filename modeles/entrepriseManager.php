<?php
    require_once('connexionBdd.php');

    // recupere toutes les entreprises
    function getAllEntreprises() {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("SELECT * FROM entreprise");

        $statement->execute() or die(print_r($statement->errorInfo()));

        $result = $statement->fetchAll();

        $bdd = null;

        return $result;
    }

    // recupere une entreprise avec son id
    function getEntrepriseById($idEntreprise) {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("SELECT * FROM entreprise where idEntreprise = :idEntreprise");
        $statement->bindParam(':idEntreprise', $idEntreprise);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $result = $statement->fetch();

        $bdd = null;

        return $result;
    }

    // mise a jour d une entreprise
    function updateEntreprise($idEntreprise, $designation, $siteWeb) {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("UPDATE entreprise SET designation = :designation,
                                    siteWeb = :siteWeb WHERE idEntreprise = :idEntreprise");

        $statement->bindParam(':designation', $designation);
        $statement->bindParam(':siteWeb', $siteWeb);
        $statement->bindParam(':idEntreprise', $idEntreprise);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $bdd = null;

        return true;
    }

    //creation d une entreprise
    function createEntreprise($idEntreprise, $designation, $siteWeb) {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("INSERT INTO entreprise VALUES (:idEntreprise, :designation, :siteWeb)");

        $statement->bindParam(':designation', $designation);
        $statement->bindParam(':siteWeb', $siteWeb);
        $statement->bindParam(':idEntreprise', $idEntreprise);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $bdd = null;

        return true;
    }

    // Supprime une entreprise avec son id
    function deleteEntreprise($idEntreprise) {
        $bdd = connexionBdd();

        $statement = $bdd->prepare("DELETE FROM entreprise where idEntreprise = :idEntreprise");
        $statement->bindParam(':idEntreprise', $idEntreprise);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $bdd = null;

        return true;
    }
?>