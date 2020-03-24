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

            return $result;
        }

        // Recuperation d un eleve par son mail
        public function getEleveByMailCESI($mailCESI) {
            $statement = $this->_db->prepare('SELECT * FROM eleve WHERE mailCESI = :mailCESI');
            $statement->bindParam(':mailCESI',$mailCESI);

            try {
                $statement->execute();
            } catch (Exception $ex) {
                throw new Exception("Imposible d'éxecuter la requete", 500);
            }

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);
            
            if($donnees) {
                return new Eleve($donnees);
            } else {
                return false;
            }
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
                                        idPromotion = :idPromotion,
                                        idTypeEleve = :idTypeEleve,
                                        idSexeEleve = :idSexeEleve WHERE mailCESI = :mailCESI");

            $statement->bindValue(':mailCESI', $eleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindValue(':mdp', $eleve->getMdp(), PDO::PARAM_STR);
            $statement->bindValue(':nom', $eleve->getNom(), PDO::PARAM_STR);
            $statement->bindValue(':prenom', $eleve->getPrenom(), PDO::PARAM_STR);
            $statement->bindValue(':dateNaissance', date_format($eleve->getDateNaissance(), 'Y-m-d'));
            $statement->bindValue(':tel', $eleve->getTel(), PDO::PARAM_STR);
            $statement->bindValue(':ville', $eleve->getVille(), PDO::PARAM_STR);
            $statement->bindValue(':description', $eleve->getDescription(), PDO::PARAM_STR);
            $statement->bindValue(':lienLinkedin', $eleve->getLienLinkedin(), PDO::PARAM_STR);
            $statement->bindValue(':imgProfil', $eleve->getImgProfil(), PDO::PARAM_STR);
            $statement->bindValue(':idEntreprise', $eleve->getIdEntreprise(), PDO::PARAM_INT);
            $statement->bindValue(':idPromotion', $eleve->getIdPromotion(), PDO::PARAM_INT);
            $statement->bindValue(':idTypeEleve', $eleve->getIdTypeEleve(), PDO::PARAM_INT);
            $statement->bindValue(':idSexeEleve', $eleve->getIdSexeEleve(), PDO::PARAM_INT);

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
                                        :idPromotion,
                                        :idTypeEleve,
                                        :idSexeEleve)");

            $statement->bindValue(':mailCESI', $eleve->getMailCESI(), PDO::PARAM_STR);
            $statement->bindValue(':mdp', $eleve->getMdp(), PDO::PARAM_STR);
            $statement->bindValue(':nom', $eleve->getNom(), PDO::PARAM_STR);
            $statement->bindValue(':prenom', $eleve->getPrenom(), PDO::PARAM_STR);
            $statement->bindValue(':dateNaissance',  date_format($eleve->getDateNaissance(), 'Y-m-d'));
            $statement->bindValue(':tel', $eleve->getTel(), PDO::PARAM_STR);
            $statement->bindValue(':ville', $eleve->getVille(), PDO::PARAM_STR);
            $statement->bindValue(':description', $eleve->getDescription(), PDO::PARAM_STR);
            $statement->bindValue(':lienLinkedin', $eleve->getLienLinkedin(), PDO::PARAM_STR);
            $statement->bindValue(':imgProfil', $eleve->getImgProfil(), PDO::PARAM_STR);
            $statement->bindValue(':idEntreprise', $eleve->getIdEntreprise(), PDO::PARAM_INT);
            $statement->bindValue(':idPromotion', $eleve->getIdPromotion(), PDO::PARAM_INT);
            $statement->bindValue(':idTypeEleve', $eleve->getIdTypeEleve(), PDO::PARAM_INT);
            $statement->bindValue(':idSexeEleve', $eleve->getIdSexeEleve(), PDO::PARAM_INT);

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
