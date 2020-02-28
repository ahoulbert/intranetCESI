<?php
    require_once('entity/PostEleve.php');

    class PostEleveManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllPostEleve() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM posteleve');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new PostEleve($donnees);
            }

            return $result;
        }

        public function getPostEleveById($idPost, $mailCESI) {
            $statement = $this->_db->prepare('SELECT * FROM posteleve WHERE idPost = :idPost AND mailCESI = :mailCESI');

            $statement->bindParam(':mailCESI', $mailCESI, PDO::PARAM_STR);
            $statement->bindParam(':idPost', $idPost, PDO::PARAM_INT);

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new PostEleve($donnees);
            } else {
                return false;
            }
        }

        public function createPostEleve(PostEleve $postEleve) {
            $statement = $this->_db->prepare("INSERT INTO posteleve VALUES (:idPost, :mailCESI, :like, :comment, :commentaire)");

            $statement->bindParam(':idPost', $postEleve->getIdPost(), PDO::PARAM_INT);
            $statement->bindParam(':mailCESI', $postEleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':like', $postEleve->getLike(), PDO::PARAM_INT);
            $statement->bindParam(':comment', $postEleve->getComment(), PDO::PARAM_INT);
            $statement->bindParam(':commentaire', $postEleve->getCommentaire(), PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function updatePostEleve(PostEleve $postEleve) {
            $statement = $this->_db->prepare("UPDATE posteleve SET
                                            like = :like,
                                            comment = :comment,
                                            commentaire = :commentaire
                                            WHERE idPost = :idPost AND mailCESI = :mailCESI");

            $statement->bindParam(':mailCESI', $postEleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':idPost', $postEleve->getIdPost(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deletePostEleve($idPost, $mailCESI) {
            $statement = $this->_db->prepare("DELETE FROM posteleve where idPost = :idPost AND mailCESI = :mailCESI");
            $statement->bindParam(':idPost', $idPost, PDO::PARAM_INT);
            $statement->bindParam(':mailCESI', $mailCESI, PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>