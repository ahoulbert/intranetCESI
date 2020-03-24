<?php

    /**
     * Import fichier
     */
    require_once __DIR__.'/connexionBdd.php';
    require_once __DIR__.'/EleveEvenementManager.php';
    require_once __DIR__.'/EleveManager.php';
    require_once __DIR__.'/EleveRoleGroupeEvenementManager.php';
    require_once __DIR__.'/EntrepriseManager.php';
    require_once __DIR__.'/EnumSexeEleveManager.php';
    require_once __DIR__.'/EnumStatutAmiterManager.php';
    require_once __DIR__.'/EnumTypeEleveManager.php';
    require_once __DIR__.'/EtreAmisManager.php';
    require_once __DIR__.'/EvenementManager.php';
    require_once __DIR__.'/GroupeEleveManager.php';
    require_once __DIR__.'/GroupeManager.php';
    require_once __DIR__.'/ImageManager.php';
    require_once __DIR__.'/PostEleveManager.php';
    require_once __DIR__.'/PostManager.php';
    require_once __DIR__.'/PromotionManager.php';
    require_once __DIR__.'/RoleManager.php';
    require_once __DIR__.'/TagEleveManager.php';
    require_once __DIR__.'/TagManager.php';
    require_once __DIR__.'/TagPostManager.php';

    /**
     * Instance du manager
     */
    function getEleveEvenementManager() {
        return new EleveEvenementManager(connexionBdd());
    }

    function getEleveManager() {
        return new EleveManager(connexionBdd());
    }

    function getEleveRoleGroupeEvenementManager() {
        return new EleveRoleGroupeEvenementManager(connexionBdd());
    }

    function getEntrepriseManager() {
        return new EntrepriseManager(connexionBdd());
    }

    function getEnumSexeEleveManager() {
        return new EnumSexeEleveManager(connexionBdd());
    }

    function getEnumStatutAmiterManager() {
        return new EnumStatutAmiterManager(connexionBdd());
    }

    function getEnumTypeEleveManager() {
        return new EnumTypeEleveManager(connexionBdd());
    }

    function getEtreAmisManager() {
        return new EtreAmisManager(connexionBdd());
    }

    function getEvenementManager() {
        return new EvenementManager(connexionBdd());
    }

    function getGroupeEleveManager() {
        return new GroupeEleveManager(connexionBdd());
    }

    function getGroupeManager() {
        return new GroupeManager(connexionBdd());
    }

    function getImageManager() {
        return new ImageManager(connexionBdd());
    }

    function getPostEleveManager() {
        return new PostEleveManager(connexionBdd());
    }

    function getPostManager() {
        return new PostManager(connexionBdd());
    }

    function getPromotionManager() {
        return new PromotionManager(connexionBdd());
    }

    function getRoleManager() {
        return new RoleManager(connexionBdd());
    }

    function getTagEleveManager() {
        return new TagEleveManager(connexionBdd());
    }

    function getTagManager() {
        return new TagManager(connexionBdd());
    }

    function getTagPostManager() {
        return new TagPostManager(connexionBdd());
    }
?>