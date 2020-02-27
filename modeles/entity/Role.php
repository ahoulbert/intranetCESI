<?php
class Role
{
    private $_idRole;
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
    public function getIdRole() {
        return $this->_idRole;
    }

    public function getLibelle() {
        return $this->_libelle;
    }

    /* SETTERS */
    public function setIdRole($idRole) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idRole = (int) $idRole;
        if($idRole > 0) {
            $this->_idRole = $idRole;
        }
    }

    public function setLibelle($libelle) {
        if(is_string($libelle)) {
            $this->_libelle = $libelle;
        }
    }
}
?>