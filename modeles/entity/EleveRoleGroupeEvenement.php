<?php
class EleveRoleGroupeEvenement
{
    private $_idRole;
    private $_mailCESI;
    private $_idEvenement;
    private $_idGroupe;

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

    public function getMailCESI() {
        return $this->_mailCESI;
    }

    public function getIdEvenement() {
        return $this->_idEvenement;
    }

    public function getIdGroupe() {
        return $this->_idGroupe;
    }
    /* SETTERS */
    public function setIdRole($idRole) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idRole = (int) $idRole;
        if($idRole > 0) {
            $this->_idRole = $idRole;
        }
    }

    public function setMailCESI($mailCESI) {
        if(is_string($mailCESI)) {
            $this->_mailCESI = $mailCESI;
        }
    }

    public function setIdEvenement($idEvenement) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idEvenement = (int) $idEvenement;
        if($idEvenement > 0) {
            $this->_idEvenement = $idEvenement;
        }
    }

    public function setIdGroupe($idGroupe) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idGroupe = (int) $idGroupe;
        if($idGroupe > 0) {
            $this->_idGroupe = $idGroupe;
        }
    }
}
?>