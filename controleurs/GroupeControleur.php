<?php
    /**
     * Import fichier
     */
    require_once __DIR__.'/../modeles/connexionBdd.php';
    require_once __DIR__.'/../modeles/GroupeManager.php';
    require_once __DIR__.'/../modeles/GroupeEleveManager.php';

    define('ID_GROUPE_ALL', 1);

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
                if($group->getIdGroupe() != ID_GROUPE_ALL) {
                    array_push($groups, getGroupeManager()->getGroupeById($group->getIdGroupe()));
                }
            }
        }

        return $groups;
    }
?>
