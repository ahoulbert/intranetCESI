<?php
    /**
     * Import fichier
     */
    require_once '../modeles/connexionBdd.php';
    require_once '../modeles/GroupeManager.php';
    require_once '../modeles/GroupeEleveManager.php';

    /**
     * Instance du manager
     */
    function getGroupeManager() {
        return new GroupeManager(connexionBdd());
    }

    function getGroupeEleveManager() {
        return new GroupeEleveManager(connexionBdd());
    }

    /**
     * Routing
     */

     /**
     * Function 
     */
    function getAllGroupeByEleve($mailCESI) {
        $groupEleve = getGroupeEleveManager()->getAllGroupeEleveByEleve($mailCESI);
        
        $groups = array();

        if(!empty($groupEleve)) {
            foreach($groupEleve as $group) {
                array_push($groups, getGroupeManager()->getGroupeById($group->getIdGroupe()));
            }
        }

        return $groups;
    }
?>
