<?php
class Eleve 
{
    private $_mailCESI;
    private $_mdp;
    private $_nom;
    private $_prenom;
    private $_dateNaissance;
    private $_tel;
    private $_ville;
    private $_description;
    private $_lienLinkedin;
    private $_imgProfil;
    private $_idEntreprise;
    private $_idPromotion;
    private $_idTypeEleve;
    private $_idSexeEleve;

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

    public function getMdp() {
        return $this->_mdp;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function getDateNaissance() {
        return $this->_dateNaissance;
    }

    public function getTel() {
        return $this->_tel;
    }

    public function getVille() {
        return $this->_ville;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getLienLinkedin() {
        return $this->_lienLinkedin;
    }

    public function getImgProfil() {
        return $this->_imgProfil;
    }

    public function getIdEntreprise() {
        return $this->_idEntreprise;
    }

    public function getIdPromotion() {
        return $this->_idPromotion;
    }

    public function getIdTypeEleve() {
        return $this->_idTypeEleve;
    }

    public function getIdSexeEleve() {
        return $this->_idSexeEleve;
    }

    /* SETTERS */
    public function setMailCESI($mailCESI) {
        if(is_string($mailCESI)) {
            $this->_mailCESI = $mailCESI;
        }
    }

    public function setMdp($mdp) {
        if(is_string($mdp)) {
            $this->_mdp = $mdp;
        }
    }

    public function setNom($nom) {
        if(is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setPrenom($prenom) {
        if(is_string($prenom)) {
            $this->_prenom = $prenom;
        }
    }

    public function setDateNaissance(/* String */ $dateNaissance) {
        $this->_dateNaissance = date_create($dateNaissance);
    }

    public function setTel($tel) {
        if(is_string($tel)) {
            $this->_tel = $tel;
        }
    }

    public function setVille($ville) {
        if(is_string($ville)) {
            $this->_ville = $ville;
        }
    }

    public function setDescription($description) {
        if(is_string($description)) {
            $this->_description = $description;
        }
    }

    public function setLienLinkedin($lienLinkedin) {
        if(is_string($lienLinkedin)) {
            $this->_lienLinkedin = $lienLinkedin;
        }
    }

    public function setImgProfil($imgProfil) {
        if(is_string($imgProfil)) {
            $this->_imgProfil = $imgProfil;
        }
    }

    public function setIdEntreprise($idEntreprise) {
        // Convertit en int, si ce n'est pas un entier il le met à 0
        $idEntreprise = (int) $idEntreprise;

        if($idEntreprise > 0) {
            $this->_idEntreprise = $idEntreprise;
        }
    }

    public function setIdPromotion($idPromotion) {
        $idPromotion = (int) $idPromotion;

        if($idPromotion > 0) {
            $this->_idPromotion = $idPromotion;
        }
    }

    public function setIdTypeEleve($idTypeEleve) {
        $idTypeEleve = (int) $idTypeEleve;

        if($idTypeEleve > 0) {
            $this->_idTypeEleve = $idTypeEleve;
        } 
    }

    public function setIdSexeEleve($idSexeEleve) {
        $idSexeEleve = (int) $idSexeEleve;

        if($idSexeEleve > 0) {
            $this->_idSexeEleve = $idSexeEleve;
        }
    }
}
?>