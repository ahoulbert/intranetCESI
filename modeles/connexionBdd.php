<?php
    function connexionBdd() {
        try {
            $string = file_get_contents(__DIR__."/config.json");
            $json_a = json_decode($string, true);
            $bdd = new PDO('mysql:host='.$json_a['SERVEURBDD'].';dbname='.$json_a['NOMDELABASE'], $json_a['LOGIN'], $json_a['PASSWORD']);
        } catch (PDOException $ex) {
            die('<br> Problème de connexion serveur BDD : '.$ex->getMessage());
        }

        return $bdd;
    }
    ?>