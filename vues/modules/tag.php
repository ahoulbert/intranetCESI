<!-- Interests -->
<div class="w3-card w3-round w3-white w3-hide-small">
    <div class="w3-container">
    <p>Mes Tags</p>
    <p>
        <?php
        $tags = getAllTagByEleve($_SESSION['mail_cesi']);

        if(!empty($tags)){
            foreach($tags as $value) {
            echo '<span class="w3-tag w3-small w3-theme-l1">'.utf8_encode($value->getLibelle()).'</span>&nbsp;';
            }
        }
        ?>
    </p>
    </div>
    <div class="w3-container">
    <p>Tags disponibles</p>
    <p>
        <?php
        foreach(getAllTag() as $value) {
            echo '<span class="w3-tag w3-small w3-theme-l1">'.utf8_encode($value->getLibelle()).'</span>&nbsp;';
        }
        ?>
    </p>
    </div>
</div>