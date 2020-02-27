<?php
class Post
{
    private $_idPost;
    private $_dateCreation;
    private $_description;
    private $_titre;
    private $_mailCESI;
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
    public function getIdPost() {
        return $this->_idPost;
    }

    public function getDateCreation() {
        return $this->_dateCreation;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getTitre() {
        return $this->_titre;
    }

    public function getMailCESI() {
        return $this->_mailCESI;
    }
    public function getIdGroupe() {
        return $this->_idGroupe;
    }

    /* SETTERS */
    public function setIdPost($idPost) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idPost = (int) $idPost;
        if($idPost > 0) {
            $this->_idPost = $idPost;
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

    public function setTitre($titre) {
        if(is_string($titre)) {
            $this->_titre = $titre;
        }
    }

    public function setMailCESI($mailCESI) {
        if(is_string($mailCESI)) {
            $this->_mailCESI = $mailCESI;
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