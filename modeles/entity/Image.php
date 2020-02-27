<?php
class Image
{
    private $_idImage;
    private $_nom;
    private $_idPost;
    private $_idEvenement;

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
    public function getIdImage() {
        return $this->_idImage;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getIdPost() {
        return $this->_idPost;
    }

    public function getIdEvenement() {
        return $this->_idEvenement;
    }

    /* SETTERS */
    public function setIdImage($idImage) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idImage = (int) $idImage;
        if($idImage > 0) {
            $this->_idImage = $idImage;
        }
    }

    public function setNom($nom) {
        if(is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setIdPost($idPost) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idPost = (int) $idPost;
        if($idPost > 0) {
            $this->_idPost = $idPost;
        }
    }

    public function setIdEvenement($idEvenement) {
    // Convertit en int, si ce n'est pas un entier il le met à 0
        $idEvenement = (int) $idEvenement;
        if($idEvenement > 0) {
            $this->_idEvenement = $idEvenement;
        }
    }
}
?>