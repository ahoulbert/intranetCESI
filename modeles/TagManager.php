<?php
    require_once('entity/Tag.php');

    class TagManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllTag() {

        }

        public function getTagById($idTag) {

        }

        public function updateTag(Tag $tag) {

        }

        public function createTag(Tag $tag) {

        }

        public function deleteTag($idTag) {
            
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>