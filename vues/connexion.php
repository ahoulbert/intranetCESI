
<html lang='fr'>
    <head>
        <title>Connexion - Intranet CESI</title>
        <?php
        include_once './ressources/header.php';
        ?>
        <link rel="stylesheet" href="css/background_circle.css">
        <link rel="stylesheet" href="css/connexion.css">
    </head>
    <body>
        <div class="area" >
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
            <div id='containerAlert' style='display : none;position:absolute;width : 45%; margin-left : 27.5%;' class="w3-container">
                <!-- Champ affichage des alertes -->
            </div>
            <div class="container" id="container" style='margin-top:8%;margin-left:22.5%;'>
                <div class="form-container sign-up-container">
                    <form action="creationCompte.php" id="preFormulaireCreationCompte" method="POST">
                        <input type='hidden' name='fonctionValeur' value='continueCreationCompte' />
                        <h1>Créer mon compte</h1>
                        <input type="text" name="nom_creationEleve" id="nomCreation" placeholder="Nom" />
                        <input type="text" name="prenom_creationEleve" id="prenomCreation" placeholder="Prénom" />
                        <input type="email" name="email_creationEleve" id="mailCreation" placeholder="Entrer votre adresse mail du CESI" />
                        <input type="button" class="button"  id="btnCreationCompte"  value="Créer un compte" />
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form method="POST" id="formulaireConnexionClient">
                        <h1>Connexion</h1>
                        <input type='hidden' name='fonctionValeur' value='connexionClient' />
                        <input type="email" name="email_connexion" placeholder="Entrer votre email du cesi" />
                        <input type="password" name="mdp_connexion" placeholder="Entrer votre mot de passe" />
                        <a href="#">Mot de passe oublié ?</a>
                        <input type="button" name='btnConnexionClient' class="button" id="btnConnexionClient" value="Se connecter"  />
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Vous avez déja un compte ?</h1>
                            <p>Connecter vous au site en cliquant sur le bouton ci-dessous</p>
                            <button class="button ghost" id="signIn">Se connecter</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Créer un compte</h1>
                            <p>Entrer les données correspondantes au CESI</p>
                            <button class="button ghost" id="signUp">S'inscrire</button>
                        </div>
                    </div>
                </div>
            </div>

        </div >
    </body>
</html>

<script src="js/connexion.js"></script>
