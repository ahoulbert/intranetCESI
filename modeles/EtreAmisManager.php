<?php
    require_once('entity/EtreAmis.php');

    class EtreAmisManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // recupere toutes les relations Etre Amis
        public function getAllEtreAmis() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM EtreAmis');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new EtreAmis($donnees);
            }

            return $result;
        }

        // recupere une relation Etre Amis avec son id
        public function getEtreAmisById($mailCESIDemandeur, $mailCESIReceveur, $idStatut) {
            $statement = $this->_db->prepare('SELECT * FROM EtreAmis WHERE mailCESIDemandeur = :mailCESIDemandeur AND mailCESIReceveur = :mailCESIReceveur');
            $statement->bindParam(':mailCESIDemandeur',$mailCESIDemandeur);
            $statement->bindParam(':mailCESIReceveur',$mailCESIReceveur);
            $statement->bindParam(':idStatut',$idStatut);
            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new EtreAmis($donnees);
            } else {
                return false;
            }
        }

        //creation d'une relation EtreAmis
        public function createEtreAmis(EtreAmis $mailCESIDemandeur, $mailCESIReceveur) {
            $statement = $this->_db->prepare("INSERT INTO EtreAmis VALUES (:mailCESIDemandeur, :mailCESIReceveur)");

            $statement->bindParam(':mailCESIDemandeur', $mailCESIDemandeur->getMailCESIDemandeur(), PDO::PARAM_STR);
            $statement->bindParam(':mailCESIReceveur', $mailCESIReceveur->getMailCESIReceveur(), PDO::PARAM_STR);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        // update mettre à jour le champ statut 
        public function updateStatut (EtreAmis $idStatut) {
            $statement = $this->_db->prepare("UPDATE idStatut SET 
                                            idStatut = :idStatut,
                                            WHERE mailCESIReceveur = :mailCESIReceveur 
                                            AND mailCESIDemandeur = :mailCESIDemandeur");

            $statement->bindParam(':idStatut', $idStatut->getIdStatut(), PDO::PARAM_STR);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }


        // Supprime une relation EtreAmis avec son id
        public function deleteEtreAmis($mailCESIDemandeur, $mailCESIReceveur) {

            $statement = $this->_db->prepare("DELETE FROM EtreAmis where mailCESIDemandeur = :mailCESIDemandeur AND mailCESIReceveur = :mailCESIReceveur AND idStatut = :idStatut");
            $statement->bindParam(':mailCESIDemandeur', $mailCESIDemandeur);
            $statement->bindParam(':mailCESIReceveur', $mailCESIReceveur);
            $statement->bindParam(':idStatut', $idStatut);
            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
