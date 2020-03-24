<html lang='fr'>

    <head>
        <title>Connexion - Intranet CESI</title>
        <?php
        include_once './ressources/header.php';
        require_once '../controleurs/EleveControlleur.php';
        ?>
        <link rel="stylesheet" href="css/creationCompte.css">
    </head>
    <body>
        <div class="area">
            <ul style='margin-bottom:0px;' class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="w3-container w3-content" style="max-width:1400px; padding-top:80px;">
                <div class="wrapper wrapper--w790">
                    <div class="card card-5">
                        <div class="card-heading w3-theme-d2">
                            <h4 class="title">Formulaire d'inscription</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <img src="images/logoCesi.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 80px;">
                            </div>
                            <form action="../controleurs/EleveControlleur.php" method="POST">
                                <input type="hidden" name="fonctionValeur" value="creationCompte" />
                                <div class="form-row m-b-55">
                                    <div class="name">Identité <span class="obligatoire">*</div>
                                    <div class="value">
                                        <div class="row row-space">
                                            <div class="col-2">
                                                <div class="input-group-desc">
                                                    <input placeholder="Entrer votre nom" class="input--style-5" type="text" required name="nom" value="<?php echo $_GET['Nom']; ?>"/>
                                                </div>

                                            </div>
                                            <div class="col-2">
                                                <div class="input-group-desc">
                                                    <input placeholder="Entrer votre prénom" class="input--style-5" type="text" required name="prenom" value="<?php echo $_GET['Prenom']; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Email <span class="obligatoire">*</span></div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input placeholder="Adresse email" class="input--style-5" required type="email" name="mailCESI" value="<?php echo $_GET['mail']; ?>"/>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="name">Mot de passe <span class="obligatoire">*</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input type="password" name="mdp" class="input--style-5" required placeholder="Entrer votre mot de passe" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Date de naissance<span class="obligatoire">*</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input type="date" name="dateNaissance" class="input--style-5" required placeholder="Entrer votre Date de naissance" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Téléphone <span class="obligatoire">*</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input placeholder="Numéro de téléphone" class="input--style-5" required type="text" name="tel" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Entreprise</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input placeholder="Nom de mon entreprise" class="input--style-5" type="text" name="nomEntreprise" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Ville</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input placeholder="Ville" class="input--style-5" type="text" name="ville">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Description</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <textarea style="border : none;" placeholder="Quelques mots à propos de moi ..." class="area--style-5" type="text" name="description" id="story" name="story"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Statut</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <select style="border : none;width:100%;" name="idTypeEleve" class="input--style-5">
                                                <?php
                                                $types = allTypeEleve();
                                                foreach($types as $type){
                                                    echo '<option value="'.$type->getIdTypeEleve().'" >'.$type->getLibelle().'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Promotion</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <select style="border : none;width:100%;" name="idPromotion" class="input--style-5">
                                                <?php
                                                $promotion = allPromotion();
                                                foreach($promotion as $promo){
                                                    echo '<option value="'.$promo->getIdPromotion().'" >'.$promo->getNom().' '.$promo->getAnnee().'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Sexe</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <label class="radio-container m-r-55">Homme
                                                <input type="radio" checked name="idSexeEleve" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">Femme
                                                <input type="radio" name="idSexeEleve" value="2">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row m-b-55" style="padding-top: 40px;">
                                    <div class="name"></div>
                                    <div class="value">
                                        <div class="row row-space">
                                            <div class="col-2">
                                                <div class="input-group-desc">
                                                    <input type="submit" class="button-style" value="Créer un compte" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="input-group-desc">
                                                    <input  class="button-style" onclick="history.go(-1)" type="button" value="Retour" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>

</html>
<script>
    $(document).ready(function () {
        var emailLargeur = $('#emailCesiText').innerWidth();
        $('#descriptionTextarea').css('width', emailLargeur + 'px');
    });
</script>