<?php
    require_once('entity/Tag.php');

    class TagManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllTag() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM tag');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Tag($donnees);
            }

            return $result;
        }

        public function getTagById($idTag) {
            $statement = $this->_db->prepare('SELECT * FROM tag WHERE idTag = :idTag');

            $statement->bindParam(':idTag', $idTag, PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Tag($donnees);
            } else {
                return false;
            }
        }

        public function updateTag(Tag $tag) {
            $statement = $this->_db->prepare("UPDATE tag SET 
                                            libelle = :libelle
                                            WHERE idTag = :idTag");

            $statement->bindParam(':libelle', $tag->getLibelle(), PDO::PARAM_STR);
            $statement->bindParam(':idTag', $tag->getIdTag(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function createTag(Tag $tag) {
            $statement = $this->_db->prepare("INSERT INTO tag (libelle)
                                            VALUES (:libelle)");

            $statement->bindParam(':libelle', $tag->getLibelle(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deleteTag($idTag) {
            $statement = $this->_db->prepare("DELETE FROM tag where idTag = :idTag");
            $statement->bindParam(':idTag', $idTag, PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>