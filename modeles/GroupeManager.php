<?php
    require_once('entity/Groupe.php');

    class GroupeManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // recupere tous les groupes
        public function getAllGroupe() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM Groupe');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Groupe($donnees);
            }

            return $result;
        }

        // recupere un groupe avec son id
        public function getGroupeById($idGroupe) {
            $statement = $this->_db->prepare('SELECT * FROM groupe WHERE idGroupe = :idGroupe');
            $statement->bindParam(':idGroupe',$idGroupe);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Groupe($donnees);
            } else {
                return false;
            }
        }

        // mise a jour d un groupe
        public function updateGroupe(Groupe $groupe) {

            $statement = $this->_db->prepare("UPDATE Groupe SET nom = :nom,
                                        dateCreation = :dateCreation, description = :description WHERE idGroupe = :idGroupe");

            $statement->bindParam(':nom', $groupe->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':dateCreation', $groupe->getDateCreation(), PDO::PARAM_STR);
            $statement->bindParam(':description', $groupe->getDescription(), PDO::PARAM_STR);
            $statement->bindParam(':idGroupe', $groupe->getIdGroupe(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        //creation d'un groupe
        public function createGroupe(Groupe $groupe) {
            $statement = $this->_db->prepare("INSERT INTO Groupe VALUES (:idGroupe, :nom, :dateCreation, :description)");

            $statement->bindParam(':nom', $groupe->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':dateCreation', $groupe->getDateCreation(), PDO::PARAM_STR);
            $statement->bindParam(':description', $groupe->getDescription(), PDO::PARAM_STR);
            $statement->bindParam(':idGroupe', $groupe->getIdGroupe(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        // Supprime un groupe avec son id
        public function deleteEntreprise($idGroupe) {

            $statement = $this->_db->prepare("DELETE FROM Groupe where idGroupe = :idGroupe");
            $statement->bindParam(':idGroupe', $idGroupe);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
