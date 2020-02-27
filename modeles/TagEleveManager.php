<?php
    require_once('entity/TagEleve.php.php');

    class TagEleveManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllTagEleve() {

        }

        public function getTagEleveById($idTagEleve) {

        }

        public function updateTagEleve(TagEleve $tagEleve) {

        }

        public function createTagEleve(TagEleve $tagEleve) {

        }

        public function deleteTagEleve($idTagEleve) {
            
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>