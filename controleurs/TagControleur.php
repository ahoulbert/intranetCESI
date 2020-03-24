<?php
    /**
     * Import fichier
     */
    require_once  __DIR__.'/../modeles/Managers.php';

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
