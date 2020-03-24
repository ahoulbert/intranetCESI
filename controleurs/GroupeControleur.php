<?php
    /**
     * Import fichier
     */
    require_once  __DIR__.'/../modeles/Managers.php';
    
    define('ID_GROUPE_ALL', 1);

    if (isset($_POST['fonctionValeur'])) {
        switch ($_POST['fonctionValeur']) {
            case 'creationGroupe':
                createGroupe();
                break;
        }
    }

    /**
     * Routing
     */
    if (isset($_POST['fonctionValeur'])) {
        switch ($_POST['fonctionValeur']) {
            case 'updateGroupe':
                updateGroupe();
                break;
        }
    }
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

   function getAllGroupeSuggest($mailCESI) {
       return getGroupeManager()->getAllGroupeSuggest($mailCESI);
   }


   function createGroupe()
{

        $groupe = new Groupe(array(
            'nom' => $_POST['nom'],
            'dateCreation' => null,
            'description' => $_POST['description']
        ));
        
        $newGroupe = getGroupeManager()->creategroupe($groupe);

        $groupeEleve = new GroupeEleve(array(
            'idGroupe' => $newGroupe->getIdGroupe(),
            'mailCESI' => $_POST['mail_cesi']
        ));

        getGroupeEleveManager()->createGroupeEleve($groupeEleve);
      
       header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranetcesi/vues/groupes/creationGroupe.php?statusSave=1');
      
}
     

function updateGroupe() 
{
$groupEleve = new GroupeEleve(array(
    'idGroupe' => $_POST['idGroupe'],
    'mailCESI' => $_POST['mailCESI'],
));

getGroupeEleveManager() -> createGroupeEleve($groupEleve);
header('Content-Type: application/json;charset=utf-8');
        echo json_encode(true);
}
?>
