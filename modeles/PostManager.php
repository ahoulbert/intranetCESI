<?php
    require_once('entity/Post.php');

    class PostManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllPost() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM post');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Post($donnees);
            }

            return $result;
        }

        public function getAllPostByGroupe($idGroupe) {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM post WHERE idGroupe = :idGroupe ORDER BY idPost DESC');
            $statement->bindValue(':idGroupe', $idGroupe);

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Post($donnees);
            }

            return $result;
        }

        public function getPostById($idPost) {
            $statement = $this->_db->prepare('SELECT * FROM post WHERE idPost = :idPost');
            $statement->bindParam(':idPost',$idPost);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Post($donnees);
            } else {
                return false;
            }
        }

        public function updatePost(Post $post) {
            $statement = $this->_db->prepare("UPDATE post SET
                                        dateCreation = :dateCreation
                                        description = :description,
                                        titre = :titre,
                                        mailCESI = :mailCESI,
                                        idGroupe = :idGroupe 
                                        WHERE idPost = :idPost");

            $statement->bindParam(':dateCreation', $post->getDateCreation());
            $statement->bindParam(':description', $post->getDescription(), PDO::PARAM_STR);
            $statement->bindParam(':titre', $post->getTitre(), PDO::PARAM_STR);
            $statement->bindParam(':mailCESI', $post->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':idGroupe', $post->getIdGroupe(), PDO::PARAM_INT);
            $statement->bindParam(':idPost', $post->getIdPost(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function createPost(Post $post) {
            $statement = $this->_db->prepare("INSERT INTO post (dateCreation, description, titre, mailCESI, idGroupe)
                                            VALUES (:dateCreation, :description, :titre, :mailCESI, :idGroupe)");

            $statement->bindValue(':dateCreation', date_format($post->getDateCreation(), 'Y-m-d'));
            $statement->bindValue(':description', $post->getDescription(), PDO::PARAM_STR);
            $statement->bindValue(':titre', $post->getTitre(), PDO::PARAM_STR);
            $statement->bindValue(':mailCESI', $post->getMailCESI(), PDO::PARAM_STR);
            $statement->bindValue(':idGroupe', $post->getIdGroupe(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $statement = $this->_db->prepare("SELECT * FROM post where idPost = :idPost");
            $statement->bindValue(':idPost', $this->_db->lastInsertId());

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Post($donnees);
            } else {
                return false;
            }
        }

        public function deletePost($idPost) {
            $statement = $this->_db->prepare("DELETE FROM post where idPost = :idPost");
            $statement->bindParam(':idPost', $idPost);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>