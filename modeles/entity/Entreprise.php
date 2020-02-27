<?php
    class Entreprise
    {

        private $_idEntreprise;
        private $_designation;
        private $_siteWeb;

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
        public function getIdEntreprise() {
            return $this->_idEntreprise;
        }

        public function getDesignation() {
            return $this->_designation;
        }

        public function getSiteWeb() {
            return $this->_siteWeb;
        }

        /* SETTERS */
        public function setIdEntreprise($idEntreprise) {
            $idEntreprise = (int) $idEntreprise;

            if($idEntreprise > 0) {
                $this->_idEntreprise = $idEntreprise;
            }
        }

        public function setDesignation($designation) {
            if(is_string($designation)) {
                $this->_designation = $designation;
            }
        }

        public function setSiteWeb($siteWeb) {
            if(is_string($siteWeb)) {
                $this->_siteWeb = $siteWeb;
            }
        }
    }
?>