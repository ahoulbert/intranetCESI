<div class="w3-card w3-round">
    <div class="w3-white">
    <button onclick="deplierAccordeon('group')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Mes groupes</button>
    <div id="group" class="w3-hide w3-container">
        <?php
        require_once __DIR__."/../../controleurs/GroupeControleur.php";

        $groups = getAllGroupeByEleve($_SESSION['mail_cesi']);
        //var_dump($groups);
        if(!empty($groups)) {
            foreach($groups as $value) {
            echo '<p>'.utf8_encode($value->getNom()).'</p>';
            }
        } else {
            echo '<p>Vous n\'avez pas de groupe</p>';
        }
        ?>
    </div>
    <button onclick="deplierAccordeon('event')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Mes événements</button>
    <div id="event" class="w3-hide w3-container">
        <p>Some other text..</p>
    </div>
    <button onclick="deplierAccordeon('image')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-image fa-fw w3-margin-right"></i> Mes photos</button>
        <div id="image" class="w3-hide w3-container">
            <div class="w3-row-padding">
            <br>
            <div class="w3-half">
                <img src="https://www.w3schools.com/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
                <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
                <img src="https://www.w3schools.com/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
                <img src="https://www.w3schools.com/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
                <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
                <img src="https://www.w3schools.com/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
            </div>
            </div>
        </div>
    </div>
</div>