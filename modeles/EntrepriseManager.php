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

            if($donnees) {
                return new Entreprise($donnees);
            } else {
                return false;
            }
        }

        // recupere la dernière entreprise
        public function recupererIdDerniereEntreprise() {
            $statement = $this->_db->prepare('SELECT * FROM `entreprise` order by idEntreprise desc limit 1');

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Entreprise($donnees);
            } else {
                return false;
            }
        }

        // mise a jour d une entreprise
        public function updateEntreprise(Entreprise $entreprise) {

            $statement = $this->_db->prepare("UPDATE entreprise SET designation = :designation,
                                        siteWeb = :siteWeb WHERE idEntreprise = :idEntreprise");

            $statement->bindValue(':designation', $entreprise->getDesignation(), PDO::PARAM_STR);
            $statement->bindValue(':siteWeb', $entreprise->getSiteWeb(), PDO::PARAM_STR);
            $statement->bindValue(':idEntreprise', $entreprise->getIdEntreprise(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }


        //creation d une entreprise
        public function createEntreprise(Entreprise $entreprise) {
            $statement = $this->_db->prepare("INSERT INTO entreprise (designation, siteWeb) VALUES (:designation, :siteWeb)");

            $designation = $entreprise->getDesignation();
            $siteWeb = $entreprise->getSiteWeb();

            $statement->bindParam(':designation', $designation, PDO::PARAM_STR);
            $statement->bindParam(':siteWeb', $siteWeb, PDO::PARAM_STR);

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
