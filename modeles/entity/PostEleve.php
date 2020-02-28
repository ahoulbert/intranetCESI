<?php
    class PostEleve
    {
        private $_idPost;
        private $_mailCESI;
        private $_like;
        private $_comment;
        private $_commentaire;

        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value)
            {
                // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);
                    
                // Si le setter correspondant existe.
                if (method_exists($this, $method))
                {
                    // On appelle le setter.
                    $this->$method($value);
                }
            }
        }

        /* GETTERS */
        public function getIdPost() {
            return $this->_idPost;
        }

        public function getMailCESI() {
            return $this->_mailCESI;
        }

        public function getLike() {
            return $this->_like;
        }

        public function getComment() {
            return $this->_comment;
        }

        public function getCommentaire() {
            return $this->_commentaire;
        }

        /* SETTERS */
        public function setIdPost($idPost) {
            $idPost = (int) $idPost;
            if($idPost > 0) {
                $this->_idPost = $idPost;
            }
        }

        public function setMailCESI($mailCESI) {
            if(is_string($mailCESI)) {
                $this->_mailCESI = $mailCESI;
            }
        }

        public function setLike($like) {
            $like = (int) $like;
            if($like >= 0) {
                $this->_like = $like;
            }
        }

        public function setComment($comment) {
            $comment = (int) $comment;
            if($comment >= 0) {
                $this->_comment = $comment;
            }
        }

        public function setCommentaire($commentaire) {
            if(is_string($commentaire)) {
                $this->_commentaire = $commentaire;
            }
        }
    }
?>