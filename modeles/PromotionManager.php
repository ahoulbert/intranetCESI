<?php
    require_once('entity/Promotion.php');

    class PromotionManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllPromotion() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM promotion ORDER BY nom');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Promotion($donnees);
            }

            return $result;
        }

        public function getPromotionById($idPromotion) {
            $statement = $this->_db->prepare('SELECT * FROM promotion WHERE idPromotion = :idPromotion');
            $statement->bindParam(':idPromotion',$idPromotion);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Promotion($donnees);
            } else {
                return false;
            }
        }

        public function updatePromotion(Promotion $promotion) {
            $statement = $this->_db->prepare("UPDATE promotion SET nom = :nom,
                                        annee = :annee, effectif = :effectif WHERE idPromotion = :idPromotion");

            $statement->bindParam(':nom', $promotion->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':annee', $promotion->getAnnee(), PDO::PARAM_STR);
            $statement->bindParam(':effectif', $promotion->getEffectif(), PDO::PARAM_INT);
            $statement->bindParam(':idPromotion', $promotion->getIdPromotion(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function createPromotion(Promotion $promotion) {
            $statement = $this->_db->prepare("INSERT INTO promotion (nom, annee, effectif) VALUES (:nom, :annee, :effectif)");

            $statement->bindParam(':nom', $promotion->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':annee', $promotion->getAnnee(), PDO::PARAM_STR);
            $statement->bindParam(':effectif', $promotion->getEffectif(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deletePromotion($idPromotion) {
            $statement = $this->_db->prepare("DELETE FROM promotion where idPromotion = :idPromotion");
            $statement->bindParam(':idPromotion', $idPromotion);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>