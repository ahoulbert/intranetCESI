<?php
    require_once('entity/Entreprise.php');

    class EntrepriseManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // recupere toutes les entreprises
        public function getAllEntreprises() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM entreprise ORDER BY designation');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Entreprise($donnees);
            }

            return $result;
        }

        // recupere une entreprise avec son id
        public function getEntrepriseById($idEntreprise) {
            $statement = $this->_db->prepare('SELECT * FROM entreprise WHERE idEntreprise = :idEntreprise');
            $statement->bindParam(':idEntreprise',$idEntreprise);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            return new Entreprise($donnees);
        }

        // mise a jour d une entreprise
        public function updateEntreprise(Entreprise $entreprise) {

            $statement = $this->_db->prepare("UPDATE entreprise SET designation = :designation,
                                        siteWeb = :siteWeb WHERE idEntreprise = :idEntreprise");

            $statement->bindParam(':designation', $entreprise->getDesignation(), PDO::PARAM_STR);
            $statement->bindParam(':siteWeb', $entreprise->getSiteWeb(), PDO::PARAM_STR);
            $statement->bindParam(':idEntreprise', $entreprise->getIdEntreprise(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        //creation d une entreprise
        public function createEntreprise(Entreprise $entreprise) {
            $statement = $this->_db->prepare("INSERT INTO entreprise VALUES (:idEntreprise, :designation, :siteWeb)");

            $statement->bindParam(':designation', $entreprise->getDesignation(), PDO::PARAM_STR);
            $statement->bindParam(':siteWeb', $entreprise->getSiteWeb(), PDO::PARAM_STR);
            $statement->bindParam(':idEntreprise', $entreprise->getIdEntreprise(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        // Supprime une entreprise avec son id
        public function deleteEntreprise($idEntreprise) {

            $statement = $this->_db->prepare("DELETE FROM entreprise where idEntreprise = :idEntreprise");
            $statement->bindParam(':idEntreprise', $idEntreprise);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
