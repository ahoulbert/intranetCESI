<?php
    require_once('entity/Image.php');

    class ImageManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllImages() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM image');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Image($donnees);
            }

            return $result;
        }

        public function getImageById($idImage) {
            $statement = $this->_db->prepare('SELECT * FROM image WHERE idImage = :idImage');
            $statement->bindParam(':idImage',$idImage);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Image($donnees);
            } else {
                return false;
            }
        }

        public function getImageByIdPost($idPost) {
            $statement = $this->_db->prepare('SELECT * FROM image WHERE idPost = :idPost');
            $statement->bindParam(':idPost',$idPost);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Image($donnees);
            } else {
                return false;
            }
        }

        public function getImageByIdEvenement($idEvenement) {
            $statement = $this->_db->prepare('SELECT * FROM image WHERE idEvenement = :idEvenement');
            $statement->bindParam(':idEvenement',$idEvenement);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Image($donnees);
            } else {
                return false;
            }
        }

        public function updateImage (Image $image) {
            $statement = $this->_db->prepare("UPDATE image SET 
                                            nom = :nom,
                                            idPost = :idPost,
                                            idEvenement = :idEvenement 
                                            WHERE idImage = :idImage");

            $statement->bindParam(':nom', $image->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':idPost', $image->getIdPost(), PDO::PARAM_INT);
            $statement->bindParam(':idEvenement', $image->getIdEvenement(), PDO::PARAM_INT);
            $statement->bindParam(':idImage', $image->getIdImage, PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function createImage (Image $image) {
            $statement = $this->_db->prepare("INSERT INTO image (nom, idPost, idEvenement) VALUES (
                :nom,
                :idPost,
                :idEvenement)");

            $statement->bindParam(':nom', $image->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':idPost', $image->getIdPost(), PDO::PARAM_INT);
            $statement->bindParam(':idEvenement', $image->getIdEvenement(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deleteImage ($idImage) {
            $statement = $this->_db->prepare("DELETE FROM image where idImage = :idImage");
            $statement->bindParam(':idImage', $idImage);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }

?>