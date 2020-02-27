<?php
class Promotion
{
    private $_idPromotion;
    private $_nom;
    private $_annee;
    private $_effectif;  

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
    public function getIdPromotion() {
        return $this->_idPromotion;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getAnnee() {
        return $this->_annee;
    }

    public function getEffectif() {
        return $this->_effectif;
    }

    /* SETTERS */
    public function setIdPromotion($idPromotion) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idPromotion = (int) $idPromotion;
        if($idPromotion > 0) {
            $this->_idPromotion = $idPromotion;
        }
    }

    public function setNom($nom) {
        if(is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setAnnee($annee) {
        if(is_string($annee)) {
            $this->_annee = $annee;
        }
    }

    public function setEffectif($effectif) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $effectif = (int) $effectif;
        if($effectif >= 0) {
            $this->_effectif = $effectif;
        }
    }
}
?>