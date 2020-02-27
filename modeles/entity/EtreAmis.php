<?php
class EtreAmis
{
    private $_mailCESIDemandeur;
    private $_mailCESIReceveur;
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
    public function getIdStatut() {
        return $this->_idStatut;
    }

    public function getMailCESIDemandeur() {
        return $this->_mailCESIDemandeur;
    }

    public function getMailCESIReceveur() {
        return $this->_mailCESIReceveur;
    }



    /* SETTERS */
    public function setMailCESI($mailCESIDemandeur) {
        if(is_string($mailCESIDemandeur)) {
            $this->_mailCESIDemandeur = $mailCESIDemandeur;
        }
    }

    public function setMailCESI_Eleve($mailCESIReceveur) {
        if(is_string($mailCESIReceveur)) {
            $this->_mailCESIReceveur = $mailCESIReceveur;
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