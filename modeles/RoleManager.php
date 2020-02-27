<?php
    require_once('entity/Role.php');

    class RoleManager
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllRole() {
            $result = [];

            $statement = $this->_db->prepare('SELECT * FROM role');

            $statement->execute() or die(print_r($statement->errorInfo()));

            while ($donnees = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = new Role($donnees);
            }

            return $result;
        }

        public function getRoleById($idRole) {
            $statement = $this->_db->prepare('SELECT * FROM role WHERE idRole = :idRole');
            $statement->bindParam(':idRole',$idRole);

            $statement->execute() or die(print_r($statement->errorInfo()));

            $donnees = $statement->fetch(PDO::FETCH_ASSOC);

            if($donnees) {
                return new Role($donnees);
            } else {
                return false;
            }
        }

        public function updateRole(Role $role) {
            $statement = $this->_db->prepare("UPDATE role SET 
                                            libelle = :libelle
                                            WHERE idRole = :idRole");

            $statement->bindParam(':libelle', $role->getLibelle(), PDO::PARAM_STR);
            $statement->bindParam(':idRole', $role->getIdRole(), PDO::PARAM_INT);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function createRole(Role $role) {
            $statement = $this->_db->prepare("INSERT INTO role (libelle) VALUES (:libelle)");

            $statement->bindParam(':nom', $role->getLibelle(), PDO::PARAM_STR);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function deleteRole($idRole) {
            $statement = $this->_db->prepare("DELETE FROM role where idRole = :idRole");
            $statement->bindParam(':idRole', $idRole);

            $statement->execute() or die(print_r($statement->errorInfo()));
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>