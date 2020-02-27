<?php
class Groupe 
{
    private $_idGroupe;
    private $_nom;
    private $_dateCreation;
    private $_description;

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
    public function getIdGroupe() {
        return $this->_idGroupe;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getDateCreation() {
        return $this->_dateCreation;
    }

    public function getDescription() {
        return $this->_description;
    }

    /* SETTERS */
        public function setIdGroupe($idGroupe) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idGroupe = (int) $idGroupe;
        if($idGroupe > 0) {
            $this->_idGroupe = $idGroupe;
        }
    }

    public function setNom($nom) {
        if(is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setDateCreation(/* String */ $dateCreation) {
        $this->_dateCreation = date_create($dateCreation);
    }

    public function setDescription($description) {
        if(is_string($description)) {
            $this->_description = $description;
        }
    }
}
?>