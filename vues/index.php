<?php
  //On demarre la session
  session_start();

  // On teste si la variable de session existe et contient une valeur
  if(empty($_SESSION['mail_cesi'])) 
  {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
    exit();
  }
  //Fichiers inclut
  require_once '../controleurs/EleveControlleur.php';
  require_once '../controleurs/PostControleur.php';

  //Infos eleves
  $infosEleve=infosEleve($_SESSION['mail_cesi']);
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include_once("navBar.php");
  ?>
  <title>Intranet CESI</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body class="w3-theme-l5">
  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <?php
          include_once('modules/profile.php');
        ?>
        <br>
        <!-- Accordion -->
        <?php
          include_once('modules/accordeon.php');
        ?>
        <br>
        <?php
          include_once('modules/tag.php');
        ?>
        <br>
        <!-- End Left Column -->
      </div>

      <!-- Middle Column -->
      <input type="hidden" id="mailCESI" value="<?php echo $_SESSION['mail_cesi']; ?>">
      <div class="w3-col m7">
        <div class="w3-row-padding" id="blankPost">
          <div class="w3-col m12">
            <div class="w3-card w3-round w3-white">
              <div class="w3-container w3-padding">
                <textarea style="overflow:auto;resize:none" class="w3-input w3-border w3-padding w3-margin-bottom" type="text" id="new-post" placeholder="Que voulez-vous dire, <?php echo utf8_encode($infosEleve['0']['eleve']->getPrenom()); ?> ?"></textarea>
                <button type="button" class="w3-button w3-theme" onclick="newPost(event);"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Publier</button>
                <button type="button" class="w3-button w3-theme"><i class="fa fa-image"></i>&nbsp;&nbsp;Photo</button>
              </div>
            </div>
          </div>
        </div>

        <?php
          $posts = getAllPostGroupeAll($_SESSION['mail_cesi']);

          if(!empty($posts)) {
            foreach($posts as $post) {

              if($post->auteur->getImgProfil()) {
                $imgProfilAuteur = "http://".$_SERVER['HTTP_HOST']."/intranetCESI/uploads/imgProfil/".$post->auteur->getImgProfil();
              } else {
                $imgProfilAuteur =  "http://".$_SERVER['HTTP_HOST']."/intranetCESI/uploads/imgProfil/default.jpg";
              }

              

              echo '<div class="w3-container w3-card w3-white w3-round w3-margin post"><br>';
              echo '<img src="'.$imgProfilAuteur.'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px" onerror="this.onerror=null;this.src=\'../uploads/imgProfil/default.jpg\'">';
              echo '<h4>'.utf8_encode($post->auteur->getPrenom()).' '.utf8_encode($post->auteur->getNom()).'</h4><br>';
              echo '<hr class="w3-clear">';
              echo '<p>'.utf8_encode($post->getDescription()).'</p><br>';
              echo '<span class="w3-left w3-opacity" id="nbLikes-'.$post->getIdPost().'"><i class="fa fa-thumbs-up"></i>&nbsp;'.$post->nbLikes.'</span>';
              echo '<span class="w3-right w3-opacity"><i class="fa fa-comment"></i>&nbsp;'.count($post->comments).'</span>';
              echo '<hr class="w3-clear">';
              
              if($post->postEleve->getLike() == 1){
                echo '<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" id="'.$post->getIdPost().'-0" onclick="updateLike(this.id, event)"><i class="fa fa-thumbs-up" style="color:#419ff6"></i>  J\'aime</button>&nbsp;';
              } else {
                echo '<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" id="'.$post->getIdPost().'-1" onclick="updateLike(this.id, event)""><i class="fa fa-thumbs-up"></i>  J\'aime</button>&nbsp;';
              }
              echo '<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Commenter</button>';
              echo '</div>';
            }
          }
        ?>

        <div class="w3-container w3-card w3-white w3-round w3-margin post" id="new-post-container" style="display:none;"><br>
          <img src="<?php
              if($infosEleve['0']['eleve']->getImgProfil()) {
                echo "http://".$_SERVER['HTTP_HOST']."/intranetCESI/uploads/imgProfil/".$infosEleve['0']['eleve']->getImgProfil();
              } else {
                echo "http://".$_SERVER['HTTP_HOST']."/intranetCESI/uploads/imgProfil/default.jpg";
              }
            ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" onerror="this.onerror=null;this.src='../uploads/imgProfil/default.jpg'" style="width:60px" id="new-img">
          <h4 id="new-title"><?php echo utf8_encode($infosEleve['0']['eleve']->getPrenom()).' '.utf8_encode($infosEleve['0']['eleve']->getNom());?></h4><br>
          <hr class="w3-clear">
          <p id="new-text"></p><br>
          <span class="w3-left w3-opacity" id="nbLikes-new"><i class="fa fa-thumbs-up"></i>&nbsp;0</span>
          <span class="w3-right w3-opacity"><i class="fa fa-comment"></i>&nbsp;0</span>
          <hr class="w3-clear">
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" id="new-nblike-1" onclick="updateLike(this.id, event)""><i class="fa fa-thumbs-up"></i>  J'aime</button>&nbsp;
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Commenter</button>
        </div>

        <!-- End Middle Column -->
      </div>

      <!-- Right Column -->
      <div class="w3-col m2">
        <?php
          include_once('modules/evenement.php');
        ?>
        <br>

        <?php
          include_once('modules/amitier.php');
        ?>
        <br>
        <!-- End Right Column -->
      </div>

      <!-- End Grid -->
    </div>

    <!-- End Page Container -->
  </div>
  <br>

  <!-- Footer -->
  <?php
    include_once('ressources/footer.php');
  ?>
  <script src="js/indexPosts.js"></script>
</body>

</html>