<?php
    /**
     * Import fichier
     */
    require_once '../modeles/connexionBdd.php';
    require_once '../modeles/TagManager.php';
    require_once '../modeles/TagEleveManager.php';

    /**
     * Instance du manager
     */
    function getTagManager() {
        return new TagManager(connexionBdd());
    }

    function getTagEleveManager() {
        return new TagEleveManager(connexionBdd());
    }

    /**
     * Routing
     */

     /**
     * Function 
     */
    function getAllTag() {
        return getTagManager()->getAllTag();
    }

    function getAllTagByEleve($mailCESI) {
        $tageleve = getTagEleveManager()->getTagEleveByMail($mailCESI);
        
        $tags = array();

        if(!empty($tageleve)) {
            foreach($tageleve as $tag) {
                array_push($tags, getTagManager()->getTagById($tag->getIdTag()));
            }
        }

        return $tags;
    }
?>
