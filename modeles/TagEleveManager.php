<?php
    require_once('entity/TagEleve.php');

    class TagEleveManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllTagEleve() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM tageleve');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new TagEleve($donnees);
            }

            return $result;
        }

        public function getTagEleveById($idTag, $mailCESI) {
            $statement = $this->_db->prepare('SELECT * FROM tageleve WHERE idTag = :idTag and mailCESI = :mailCESI');
            $statement->bindParam(':mailCESI', $mailCESI, PDO::PARAM_STR);
            $statement->bindParam(':idTag', $idTag, PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new TagEleve($donnees);
            } else {
                return false;
            }
        }

        public function getTagEleveByMail($mailCESI) {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM tageleve WHERE mailCESI = :mailCESI');
            $statement->bindParam(':mailCESI', $mailCESI, PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new TagEleve($donnees);
            }

            return $result;
        }

        public function createTagEleve(TagEleve $tagEleve) {
            $statement = $this->_db->prepare("INSERT INTO tageleve
                                            VALUES (:idTag, :mailCESI)");

            $statement->bindParam(':mailCESI', $tagEleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':idTag', $tagEleve->getIdTag(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deleteTagEleve($idTag, $mailCESI) {
            $statement = $this->_db->prepare("DELETE FROM tageleve where idTag = :idTag and mailCESI = :mailCESI");
            $statement->bindParam(':idTag', $idTag, PDO::PARAM_INT);
            $statement->bindParam(':mailCESI', $mailCESI, PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>