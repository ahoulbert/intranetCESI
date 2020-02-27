<?php
class TagPost
{
    private $_idPost;
    private $_idTag;

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

    public function getIdTag() {
        return $this->_idTag;
    }

    /* SETTERS */
    public function setIdPost($idPost) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idPost = (int) $idPost;
        if($idPost > 0) {
            $this->_idPost = $idPost;
        }
    }

    public function setIdTag($idTag) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idTag = (int) $idTag;
        if($idTag > 0) {
            $this->_idTag = $idTag;
        }
    }


    
}
?>