<?php
class Tag 
{
    private $_idTag;
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

    /* GETTERS */
    public function getIdTag() {
        return $this->_idTag;
    }

    public function getLibelle() {
        return $this->_libelle;
    }

    /* SETTERS */
    public function setIdTag($idTag) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idTag = (int) $idTag;
        if($idTag > 0) {
            $this->_idTag = $idTag;
        }
    }

    public function setLibelle($libelle) {
        if(is_string($libelle)) {
            $this->_libelle = $libelle;
        }
    }
}
?>