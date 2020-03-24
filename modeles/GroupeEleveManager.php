<?php
    require_once('entity/GroupeEleve.php');

    class GroupeEleveManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // recupere tous les groupes élève
        public function getAllGroupeEleve() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM GroupeEleve');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new GroupeEleve($donnees);
            }

            return $result;
        }

        public function getAllGroupeEleveByEleve($mailCESI) {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM GroupeEleve WHERE mailCESI = :mailCESI');
            $statement->bindValue(':mailCESI',$mailCESI, PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new GroupeEleve($donnees);
            }

            return $result;
        }

        // recupere un groupe avec son id
        public function getGroupeEleveById($idGroupe, $mailCESI) {
            $statement = $this->_db->prepare('SELECT * FROM GroupeEleve WHERE idGroupe = :idGroupe AND mailCESI = :mailCESI');
            $statement->bindValue(':idGroupe',$idGroupe);
            $statement->bindValue(':mailCESI',$mailCESI);
            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new GroupeEleve($donnees);
            } else {
                return false;
            }
        }

        //creation d'un groupe
        public function createGroupeEleve(GroupeEleve $groupeEleve) {
            $statement = $this->_db->prepare("INSERT INTO GroupeEleve VALUES (:idGroupe, :mailCESI)");

            $statement->bindValue(':idGroupe', $groupeEleve->getIdGroupe(), PDO::PARAM_INT);
            $statement->bindValue(':mailCESI', $groupeEleve->getMailCESI(), PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        
        // Supprime un groupe avec son id
        public function deleteEntreprise($idGroupe, $mailCESI) {

            $statement = $this->_db->prepare("DELETE FROM GroupeEleve where idGroupe = :idGroupe AND mailCESI = :mailCESI");
            $statement->bindValue(':idGroupe', $idGroupe);
            $statement->bindValue(':mailCESI', $mailCESI);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
