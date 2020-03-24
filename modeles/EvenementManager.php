<?php
    require_once('entity/Evenement.php');

    class EvenementManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllEvenement() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM evenement');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Evenement($donnees);
            }

            return $result;
        }

        public function getEvenementById($idEvenement) {
            $statement = $this->_db->prepare('SELECT * FROM evenement WHERE idEvenement = :idEvenement');
            $statement->bindValue(':idEvenement',$idEvenement);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Evenement($donnees);
            } else {
                return false;
            }
        }

        public function getAllEvenementAVenir() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM evenement WHERE date >= NOW()');

            $statement->execute() or die(print_r($statement->errorInfo()));
            
            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Evenement($donnees);
            }

            return $result;
        }

        public function getAllEvenementPasses() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM evenement WHERE date < NOW()');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Evenement($donnees);
            }

            return $result;
        }

        public function updateEvenement(Evenement $event) {
            $statement = $this->_db->prepare("UPDATE evenement SET
                                        titre = :titre,
                                        description = :description,
                                        date = :date,
                                        dateCreation = :dateCreation,
                                        lieu = :lieu
                                        WHERE idEvenement = :idEvenement");

            $statement->bindValue(':titre', $event->getTitre(), PDO::PARAM_STR);
            $statement->bindValue(':description', $event->getDescription(), PDO::PARAM_STR);
            $statement->bindValue(':date', $event->getDate());
            $statement->bindValue(':dateCreation', date_format($event->getDateCreation(), 'Y-m-d'));
            $statement->bindValue(':lieu', $event->getLieu(), PDO::PARAM_STR);
            $statement->bindValue(':idEvenement', $event->getIdEvenement(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function createEvenement(Evenement $event) {
            $statement = $this->_db->prepare("INSERT INTO
                                            evenement (titre, description, date, dateCreation, lieu) 
                                            VALUES (
                                            :titre,
                                            :description,
                                            :date,
                                            :dateCreation,
                                            :lieu)");

            $statement->bindValue(':titre', $event->getTitre(), PDO::PARAM_STR);
            $statement->bindValue(':description', $event->getDescription(), PDO::PARAM_STR);
            $statement->bindValue(':date', date_format($event->getDate(), 'Y-m-d'));
            $statement->bindValue(':dateCreation', date_format($event->getDateCreation(), 'Y-m-d'));
            $statement->bindValue(':lieu', $event->getLieu(), PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $statement = $this->_db->prepare("SELECT * FROM evenement where idEvenement = :idEvenement");
            $statement->bindValue(':idEvenement', $this->_db->lastInsertId());

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Evenement($donnees);
            } else {
                return false;
            }
        }

        public function deleteEvenement($idEvenement) {
            $statement = $this->_db->prepare("DELETE FROM evenement where idEvenement = :idEvenement");
            $statement->bindValue(':idEvenement', $idEvenement);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>