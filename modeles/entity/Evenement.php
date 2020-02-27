<?php
class Evenement
{
    private $_idEvenement;
    private $_titre;
    private $_description;
    private $_date;
    private $_dateCreation;
    private $_lieu;

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
    public function getIdEvenement() {
        return $this->_idEvenement;
    }

    public function getTitre() {
        return $this->_titre;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getDate() {
        return $this->_date;
    }

    public function getDateCreation() {
        return $this->_dateCreation;
    }

    public function getLieu() {
        return $this->_lieu;
    }

    /* SETTERS */
    public function setIdEvenenement($idEvenement) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idEvenement = (int) $idEvenement;
        if($idEvenement > 0) {
            $this->_idEvenement = $idEvenement;
        }
    }

    public function setTitre($titre) {
        if(is_string($titre)) {
            $this->_titre = $titre;
        }
    }

    public function setDescription($description) {
        if(is_string($description)) {
            $this->_description = $description;
        }
    }

    public function setDate(/* String */ $date) {
        $this->_date = date_create($date);
    }

    public function setDateCreation($dateCreation) {
        $this->_dateCreation = date_create($dateCreation);
    }

   public function setLieu($lieu) {
        if(is_string($lieu)) {
            $this->_lieu = $lieu;
        }
    }
}
?>