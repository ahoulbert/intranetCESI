<?php
    require_once('entity/EnumStatutAmitier.php');

    class EnumStatutAmiterManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllStatutAmitier() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM enumstatutamitier');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new EnumStatutAmiter($donnees);
            }

            return $result;
        }

        public function getAllStatutAmitierById($idStatut) {
            $statement = $this->_db->prepare('SELECT * FROM enumstatutamitier WHERE idStatut = :idStatut');
            $statement->bindParam(':idStatut', $idStatut);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            return new EnumStatutAmiter($donnees);
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        } 
    }
?>