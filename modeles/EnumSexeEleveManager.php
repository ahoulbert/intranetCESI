<?php
    require_once('entity/EnumSexeEleve.php');

    class EnumSexeEleveManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllSexeEleve() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM enumsexeeleve');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new EnumSexeEleve($donnees);
            }

            return $result;
        }

        public function getSexeEleveById($idSexeEleve) {
            $statement = $this->_db->prepare('SELECT * FROM enumsexeeleve WHERE idSexeEleve = :idSexeEleve');
            $statement->bindParam(':idSexeEleve',$idSexeEleve);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            return new EnumSexeEleve($donnees);
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        } 
    }
?>