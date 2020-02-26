<?php
define('SERVEURBDD', 'localhost');
define('LOGIN', 'ROOT');
define('PASSWORD', '');
define('NOMDELABASE', 'intranetcesi');

function connexionBdd() {
    try {
        $bdd = new PDO('mysql:host='.SERVEURBDD.';dbname='.NOMDELABASE, LOGIN, PASSWORD);
    } catch (PDOException $ex) {
        die('<br> Problème de connexion serveur BDD : '.$ex->getMessage());
    }

    return $bdd;
}

?>