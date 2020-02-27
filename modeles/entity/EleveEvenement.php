<?php
class EleveEvenement
{
    private $_idEvenement;
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
    public function getIdEvenement() {
        return $this->_idEvenement;
    }

    public function getMailCESI() {
        return $this->_mailCESI;
    }

    /* SETTERS */
    public function setIdEvenement($idEvenement) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idEvenement = (int) $idEvenement;
        if($idEvenement > 0) {
            $this->_idEvenement = $idEvenement;
        }
    }

    public function setMailCESI($mailCESI) {
        if(is_string($mailCESI)) {
            $this->_mailCESI = $mailCESI;
        }
    }
}
?>