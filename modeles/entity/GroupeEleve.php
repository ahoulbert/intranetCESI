<?php
class GroupeEleve 
{
    private $_idGroupe;
    private $_mailCESI;

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

    public function getMailCESI() {
        return $this->_mailCESI;
    }

    /* SETTERS */
    public function setIdGroupe($idGroupe) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idGroupe = (int) $idGroupe;
        if($idGroupe > 0) {
            $this->_idGroupe = $idGroupe;
        }
    }


    public function setMailCESI($mailCESI) {
        if(is_string($mailCESI)) {
            $this->_mailCESI = $mailCESI;
        }
    }
}
?>