<?php
    require_once('entity/Eleve.php');

    class EleveManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        // Recuperation de tous les eleves
        public function getAllEleves() 
        {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM eleve ORDER BY nom');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Eleve($donnees);
            }

            var_dump($result);

            return $result;
        }

        // Recuperation d un eleve par son mail
        public function getEleveByMailCESI($mailCESI) {
            $statement = $this->_db->prepare('SELECT * FROM eleve WHERE mailCESI = :mailCESI');
            $statement->bindParam(':mailCESI',$mailCESI);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            return new Eleve($donnees);
        }

        // mise a jour d un eleve
        public function updateEleve(Eleve $eleve) {

            $statement = $this->_db->prepare("UPDATE eleve SET
                                        mdp = :mdp,
                                        nom = :nom,
                                        prenom = :prenom,
                                        dateNaissance = :dateNaissance,
                                        tel = :tel,
                                        ville = :ville,
                                        description = :description,
                                        lienLinkedin = :lienLinkedin,
                                        imgProfil = :imgProfil,
                                        idEntreprise = :idEntreprise,
                                        idPromotion = :idPromotion
                                        idTypeEleve = :idTypeEleve,
                                        idSexeEleve = :idSexeEleve WHERE mailCESI = :mailCESI");

            $statement->bindParam(':mailCESI', $eleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':mdp', $eleve->getMdp(), PDO::PARAM_STR);
            $statement->bindParam(':nom', $eleve->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':prenom', $eleve->getPrenom(), PDO::PARAM_STR);
            $statement->bindParam(':dateNaissance', $eleve->getDateNaissance);
            $statement->bindParam(':tel', $eleve->getTel(), PDO::PARAM_STR);
            $statement->bindParam(':ville', $eleve->getVille(), PDO::PARAM_STR);
            $statement->bindParam(':description', $eleve->getDescription(), PDO::PARAM_STR);
            $statement->bindParam(':lienLinkedin', $eleve->getLienLinkedin(), PDO::PARAM_STR);
            $statement->bindParam(':imgProfil', $eleve->getImgProfil(), PDO::PARAM_STR);
            $statement->bindParam(':idEntreprise', $eleve->getIdEntreprise(), PDO::PARAM_INT);
            $statement->bindParam(':idPromotion', $eleve->getIdPromotion(), PDO::PARAM_INT);
            $statement->bindParam(':idTypeEleve', $eleve->getIdTypeEleve(), PDO::PARAM_INT);
            $statement->bindParam(':idSexeEleve', $eleve->getIdSexeEleve(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        // Ajoute un eleve
        public function createEleve(Eleve $eleve) {

            $statement = $this->_db->prepare("INSERT INTO eleve VALUES (:mailCESI,
                                        :mdp,
                                        :nom,
                                        :prenom,
                                        :dateNaissance,
                                        :tel,
                                        :ville,
                                        :description,
                                        :lienLinkedin,
                                        :imgProfil,
                                        :idEntreprise,
                                        :idPromotion
                                        :idTypeEleve,
                                        :idSexeEleve)");

            $statement->bindParam(':mailCESI', $eleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindParam(':mdp', $eleve->getMdp(), PDO::PARAM_STR);
            $statement->bindParam(':nom', $eleve->getNom(), PDO::PARAM_STR);
            $statement->bindParam(':prenom', $eleve->getPrenom(), PDO::PARAM_STR);
            $statement->bindParam(':dateNaissance', $eleve->getDateNaissance);
            $statement->bindParam(':tel', $eleve->getTel(), PDO::PARAM_STR);
            $statement->bindParam(':ville', $eleve->getVille(), PDO::PARAM_STR);
            $statement->bindParam(':description', $eleve->getDescription(), PDO::PARAM_STR);
            $statement->bindParam(':lienLinkedin', $eleve->getLienLinkedin(), PDO::PARAM_STR);
            $statement->bindParam(':imgProfil', $eleve->getImgProfil(), PDO::PARAM_STR);
            $statement->bindParam(':idEntreprise', $eleve->getIdEntreprise(), PDO::PARAM_INT);
            $statement->bindParam(':idPromotion', $eleve->getIdPromotion(), PDO::PARAM_INT);
            $statement->bindParam(':idTypeEleve', $eleve->getIdTypeEleve(), PDO::PARAM_INT);
            $statement->bindParam(':idSexeEleve', $eleve->getIdSexeEleve(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deleteEleve($mailCESI) {

            $statement = $this->_db->prepare("DELETE FROM eleve where mailCESI = :mailCESI");
            $statement->bindParam(':mailCESI', $mailCESI);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>
