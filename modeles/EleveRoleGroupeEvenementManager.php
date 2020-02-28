<?php
    require_once('entity/EleveRoleGroupeEvenement.php');

    class EleveRoleGroupeEvenementManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // recupere tous les EleveRoleGroupeEvenement
        public function getAllEleveRoleGroupeEvenement() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM EleveRoleGroupeEvenement');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new EleveRoleGroupeEvenement($donnees);
            }

            return $result;
        }

        // recupere un EleveRoleGroupeEvenement avec son id
        public function getEleveRoleGroupeEvenementById($idRole, $mailCESI, $idEvenement, $idGroupe) {
            $statement = $this->_db->prepare('SELECT * FROM EleveRoleGroupeEvenement WHERE idRole = :idRole AND mailCESI = :mailCESI and idEvenement = :idEvenement AND idGroupe = :idGroupe');
            $statement->bindParam(':idRole',$idRole);
            $statement->bindParam(':mailCESI',$mailCESI);
            $statement->bindParam(':idEvenement',$idEvenement);
            $statement->bindParam(':idGroupe',$idGroupe);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new EleveRoleGroupeEvenement($donnees);
            } else {
                return false;
            }
        }

        //creation d'un EleveRoleGroupeEvenement
        public function createEleveRoleGroupeEvenement($idRole, $mailCESI, $idEvenement, $idGroupe) {
            $statement = $this->_db->prepare("INSERT INTO EleveRoleGroupeEvenement VALUES (:idRole, :mailCESI, :idEvenement, :idGroupe)");

            $statement->bindParam(':idRole', $idRole->getIdRole(), PDO::PARAM_INT);
            $statement->bindParam(':mailCESI', $mailCESI->getMailCESI(), PDO::PARAM_STR);
           $statement->bindParam(':idEvenement', $idEvenement->getIdEvenement(), PDO::PARAM_INT);
            $statement->bindParam(':idGroupe', $idGroupe->getIdGroupe(), PDO::PARAM_INT);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        // Supprime un EleveRoleGroupeEvenement avec son id
        public function deleteEleveRoleGroupeEvenement($idRole, $mailCESI, $idEvenement, $idGroupe){

            $statement = $this->_db->prepare("DELETE FROM EleveRoleGroupeEvenement where idRole = :idRole AND mailCESI = :mailCESI AND idEvenement = :idEvenement AND idGroupe = :idGroupe");
            $statement->bindParam(':idRole', $idRole);
            $statement->bindParam(':mailCESI', $mailCESI);
            $statement->bindParam(':idEvenement', $idEvenement);
            $statement->bindParam(':idGroupe', $idGroupe);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
