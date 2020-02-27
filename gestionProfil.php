<head>
    <?php
    include_once("./navbar.php");
    ?>
    <title>Mon profil</title>
</head>

<body>
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading w3-theme-d2">
                    <h4 class="title">Modifier votre profil</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <img src="vues/images/logoCesi.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;">
                        <input id="inputChangePicture" type="file" style="display: none" accept="image/png, image/jpeg" />
                        <button id="changePicture" class="btn btn--change-photo  btn--dark">Changer de photo</button>
                    </div>
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Identité</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input placeholder="Entrez votre nom" class="input--style-5" type="text" required name="nom">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input placeholder="Entrez votre prénom" class="input--style-5" type="text" required name="prenom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input placeholder="Adresse email" class="input--style-5" required type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Téléphone</div>
                            <div class="value">
                                <div class="input-group">
                                    <input placeholder="Numéro de téléphone" class="input--style-5" required type="text" name="numTel">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input placeholder="Nom de mon entreprise" class="input--style-5" type="text" name="entreprise">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Ville</div>
                            <div class="value">
                                <div class="input-group">
                                    <input placeholder="Ville de mon entreprise" class="input--style-5" type="text" name="villeEntreprise">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea placeholder="Quelques mots à propos de moi ..." class="area--style-5" type="text" name="description" id="story" name="story"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="form-row">
                                            <div class="name">Status</div>
                                            <div class="input-group">
                                                <div class="select--no-search">
                                                    <div class="p-t-15">
                                                        <select name="subject" class="custom-select sources" placeholder="Choix">
                                                            <option>Alternant</option>
                                                            <option>Etudiant</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label class="label label--block">Sexe</label>
                                        <div class="p-t-15">
                                            <label class="radio-container m-r-55">Homme
                                                <input type="radio" checked="checked" name="exist">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">Femme
                                                <input type="radio" name="exist">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--dark" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>
<script src="vues/js/gestionProfil.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>
<!-- end document-->