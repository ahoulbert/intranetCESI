<?php
    class EnumTypeEleve
    {
        private $_idTypeEleve;
        private $_libelle;

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

        // GETTERS
        public function getIdTypeEleve() {
            return $this->_idTypeEleve;
        }

        public function getLibelle() {
            return $this->_libelle;
        }

             /* SETTERS */
    public function setIdTypeEleve($idTypeEleve)
    {
        $idTypeEleve = (int) $idTypeEleve;

        if ($idTypeEleve > 0) {
            $this->_idTypeEleve = $idTypeEleve;
        }
    }

    public function setLibelle($libelle)
    {
        if (is_string($libelle)) {
            $this->_libelle = $libelle;
        }
    }
    }
