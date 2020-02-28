<?php
    /**
     * Import fichier
     */
    require_once '../modeles/connexionBdd.php';
    require_once '../modeles/TagManager.php';

    /**
     * Instance du manager
     */
    function getManager() {
        return new TagManager(connexionBdd());
    }

    /**
     * Routing
     */

     /**
     * Function 
     */
    function getAllTag() {
        return getManager()->getAllTag();
    }
?>
