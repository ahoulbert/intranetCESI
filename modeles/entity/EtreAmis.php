<?php
class EtreAmis
{
    private $_mailCESI;
    private $_mailCESI_Eleve;
    private $_idStatut;

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
    public function getMailCESI() {
        return $this->_mailCESI;
    }

    public function getMailCESI_Eleve() {
        return $this->_mailCESI_Eleve;
    }

    public function getIdStatut() {
        return $this->_idStatut;
    }

    /* SETTERS */
    public function setMailCESI($mailCESI) {
        if(is_string($mailCESI)) {
            $this->_mailCESI = $mailCESI;
        }
    }

    public function setMailCESI_Eleve($mailCESI_Eleve) {
        if(is_string($mailCESI_Eleve)) {
            $this->_mailCESI_Eleve = $mailCESI_Eleve;
        }
    }

    public function setIdStatut($idStatut) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idStatut = (int) $idStatut;
        if($idStatut > 0) {
            $this->_idStatut = $idStatut;
        }
    }


    
}
?>