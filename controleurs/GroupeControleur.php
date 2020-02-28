<?php
    /**
     * Import fichier
     */
    require_once '../modeles/connexionBdd.php';
    require_once '../modeles/GroupeManager.php';
    require_once '../modeles/GroupeEleveManager.php';

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
