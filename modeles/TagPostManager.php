<?php
    require_once('entity/TagPost.php');

    class TagPostManager 
    {
        private $_db;

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function getAllTagPost() {

        }

        public function getTagPostById($idTagPost) {

        }

        public function updateTagPost(TagPost $tagPost) {

        }

        public function createTag(TagPost $tagPost) {

        }

        public function deleteTagPost($idTagPost) {
            
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>