<!-- Profile -->
<div class="w3-card w3-round w3-white">
  <div class="w3-container">
    <h4 class="w3-center"><?php echo utf8_encode($infosEleve['0']['eleve']->getPrenom()); ?> <?php echo utf8_encode($infosEleve['0']['eleve']->getNom()); ?> </h4>
    <p class="w3-center"><img src="<?php
        if($infosEleve['0']['eleve']->getImgProfil()) {
          echo "http://".$_SERVER['HTTP_HOST']."/intranetCESI/uploads/imgProfil/".$infosEleve['0']['eleve']->getImgProfil();
        } else {
          echo "http://".$_SERVER['HTTP_HOST']."/intranetCESI/uploads/imgProfil/default.jpg";
        }
      ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar" onerror="this.onerror=null;this.src='../uploads/imgProfil/default.jpg'"></p>
    <hr>
    <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo date_format($infosEleve['0']['eleve']->getDateNaissance(), 'd-M-Y'); ?></p>
    <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo utf8_encode($infosEleve['0']['eleve']->getVille()); ?></p>
    <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo utf8_encode($infosEleve['0']['entreprise']->getDesignation()); ?></p>
  </div>
</div>