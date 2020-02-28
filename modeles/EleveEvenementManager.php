<?php
    require_once('entity/EleveEvenement.php');

    class EleveEvenementManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // recupere tous ElevesEvenement
        public function getAllEleveEvenement() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM EleveEvenement');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new EleveEvenement($donnees);
            }

            return $result;
        }

        // recupere un EleveEvenement avec son id
        public function getEleveEvenementById($idEvenement, $mailCESI) {
            $statement = $this->_db->prepare('SELECT * FROM EleveEvenement WHERE idEvenement = :idEvenement AND mailCESI = :mailCESI');
            $statement->bindParam(':idEvenement',$idEvenement);
            $statement->bindParam(':mailCESI',$mailCESI);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new EleveEvenement($donnees);
            } else {
                return false;
            }
        }

        //creation d'un EleveEvenement
        public function createEleveEvenement(EleveEvenement $eleveEvenement) {
            $statement = $this->_db->prepare("INSERT INTO EleveEvenement VALUES (:idEvenement, :mailCESI, :estInterese)");
            $statement->bindParam(':idEvenement', $eleveEvenement->getIdEvenement(), PDO::PARAM_INT);
            $statement->bindParam(':mailCESI', $eleveEvenement->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':estInterese', $eleveEvenement->getEstInterese(), PDO::PARAM_INT);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function updateEleveEvenement(EleveEvenement $eleveEvenement) {
            $statement = $this->_db->prepare("UPDATE EleveEvenement 
                                            SET estInterese = :estInterese 
                                            WHERE idEvenement = :idEvenement AND mailCESI = :mailCESI)");
                                            
            $statement->bindParam(':idEvenement', $eleveEvenement->getIdEvenement(), PDO::PARAM_INT);
            $statement->bindParam(':mailCESI', $eleveEvenement->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':estInterese', $eleveEvenement->getEstInterese(), PDO::PARAM_INT);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        // Supprime un EleveEvenement avec son id
        public function deleteEleveEvenement($idEvenement, $mailCESI) {

            $statement = $this->_db->prepare("DELETE FROM EleveEvenement where idEvenement = :idEvenement AND mailCESI = :mailCESI");
            $statement->bindParam(':idEvenement', $idEvenement);
            $statement->bindParam(':mailCESI', $mailCESI);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
