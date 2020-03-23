<?php
    /**
     * Import fichier
     */
    require_once  __DIR__.'/../modeles/Managers.php';

    /**
     * Routing
     */
    if (isset($_POST['fonctionValeur'])) {
        switch ($_POST['fonctionValeur']) {
            case 'updateLike':
                updateLike();
                break;
        }
    }

     /**
     * Function 
     */
    function getAllPostGroupeAll($mailCESi) {
        $posts = getPostManager()->getAllPostByGroupe(ID_GROUPE_ALL);

        if(!empty($posts)) {
            foreach($posts as $post) {
                $post->auteur = getEleveManager()->getEleveByMailCESI($post->getMailCESI());
                $post->postEleve = getPostEleveManager()->getPostEleveById($post->getIdPost(), $mailCESi);
                $post->nbLikes = getPostEleveManager()->getNbLikesByPost($post->getIdPost());

                $comments = getPostEleveManager()->getCommentsByPost($post->getIdPost());
                $post->comments = $comments;
            }   
        }

        return $posts;
    }

    function updateLike() {
        $postEleve = getPostEleveManager()->getPostEleveById($_POST['idPost'], $_POST['mailCESI']);

        $postEleve->setLike($_POST['isLike']);

        getPostEleveManager()->updatePostEleve($postEleve);

        header('Content-Type: application/json;charset=utf-8');
        echo json_encode(true);
    }
?>