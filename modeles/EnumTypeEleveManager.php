<?php
require_once('entity/EnumTypeEleve.php');

class EnumTypeEleveManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getAllTypeEleve() {
        $result = [];

        $statement = $this->_db->prepare('SELECT * FROM enumtypeeleve');

        $statement->execute() or die(print_r($statement->errorInfo()));

        while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = new EnumTypeEleve($donnees);
        }

        return $result;
    }

    public function getTypeEleveById($idTypeEleve) {
        $statement = $this->_db->prepare('SELECT * FROM enumtypeeleve WHERE idTypeEleve = :idTypeEleve');
        $statement->bindParam(':idTypeEleve', $idTypeEleve);

        $statement->execute() or die(print_r($statement->errorInfo()));

        $donnees = $statement->fetch(PDO::FETCH_ASSOC);

        return new EnumTypeEleve($donnees);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    } 
}
?>