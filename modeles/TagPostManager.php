<?php
    require_once('entity/TagPost.php');

    class TagPostManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllTagPost() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM tagpost');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new TagPost($donnees);
            }

            return $result;
        }

        public function getTagPostById($idPost, $idTag) {
            $statement = $this->_db->prepare('SELECT * FROM tagpost WHERE idTag = :idTag AND idPost = :idPost');

            $statement->bindParam(':idTag', $idTag, PDO::PARAM_INT);
            $statement->bindParam(':idPost', $idPost, PDO::PARAM_INT);

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new TagPost($donnees);
            } else {
                return false;
            }
        }

        public function createTagPost(TagPost $tagPost) {
            $statement = $this->_db->prepare("INSERT INTO tagpost VALUES (:idPost, :idTag)");

            $statement->bindParam(':idTag', $tagPost->getIdTag(), PDO::PARAM_INT);
            $statement->bindParam(':idPost', $tagPost->getIdPost(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deleteTagPost($idPost, $idTag) {
            $statement = $this->_db->prepare("DELETE FROM tagpost where idTag = :idTag AND idPost = :idPost");
            $statement->bindParam(':idTag', $idTag, PDO::PARAM_INT);
            $statement->bindParam(':idPost', $idPost, PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>