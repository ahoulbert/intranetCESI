
<html lang='fr'>
    <head>
        <title>Connexion - Intranet CESI</title>
        <?php
        include_once './ressources/header.php';
        ?>
        <style>

            @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

            * {
                box-sizing: border-box;
            }

            body {
                background: #f6f5f7;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                font-family: 'Exo', sans-serif;
                height: 100vh;
            }

            h1 {
                font-weight: bold;
                margin: 0;
            }

            h2 {
                text-align: center;
            }

            p {
                font-size: 14px;
                font-weight: 100;
                line-height: 20px;
                letter-spacing: 0.5px;
                margin: 20px 0 30px;
            }

            span {
                font-size: 12px;
            }

            a {
                color: #333;
                font-size: 14px;
                text-decoration: none;
                margin: 15px 0;
            }

            .button {
                border-radius: 20px;
                border: 1px solid #4d636f;
                background-color: #4d636f;
                color: #FFFFFF;
                font-size: 12px;
                font-weight: bold;
                padding: 12px 45px;
                letter-spacing: 1px;
                text-transform: uppercase;
                transition: transform 80ms ease-in;
            }

            .button:active {
                transform: scale(0.95);
            }

            .button:focus {
                outline: none;
            }

            .button.ghost {
                background-color: transparent;
                border-color: #FFFFFF;
            }

            form {
                background-color: #FFFFFF;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 0 50px;
                height: 100%;
                text-align: center;
            }

            input {
                background-color: #eee;
                border: none;
                padding: 12px 15px;
                margin: 8px 0;
                width: 100%;
            }

            .container {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
                position: relative;
                overflow: hidden;
                width: 768px;
                max-width: 100%;
                min-height: 480px;
            }

            .form-container {
                position: absolute;
                top: 0;
                height: 100%;
                transition: all 0.6s ease-in-out;
            }

            .sign-in-container {
                left: 0;
                width: 50%;
                z-index: 2;
            }

            .container.right-panel-active .sign-in-container {
                transform: translateX(100%);
            }

            .sign-up-container {
                left: 0;
                width: 50%;
                opacity: 0;
                z-index: 1;
            }

            .container.right-panel-active .sign-up-container {
                transform: translateX(100%);
                opacity: 1;
                z-index: 5;
                animation: show 0.6s;
            }

            @keyframes show {
                0%, 49.99% {
                    opacity: 0;
                    z-index: 1;
                }

                50%, 100% {
                    opacity: 1;
                    z-index: 5;
                }
            }

            .overlay-container {
                position: absolute;
                top: 0;
                left: 50%;
                width: 50%;
                height: 100%;
                overflow: hidden;
                transition: transform 0.6s ease-in-out;
                z-index: 100;
            }

            .container.right-panel-active .overlay-container{
                transform: translateX(-100%);
            }

            .overlay {
                background: #FF416C;
                background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
                background: linear-gradient(to right, #7d97a5, #4d636f);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: 0 0;
                color: #FFFFFF;
                position: relative;
                left: -100%;
                height: 100%;
                width: 200%;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
            }

            .container.right-panel-active .overlay {
                transform: translateX(50%);
            }

            .overlay-panel {
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 0 40px;
                text-align: center;
                top: 0;
                height: 100%;
                width: 50%;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
            }

            .overlay-left {
                transform: translateX(-20%);
            }

            .container.right-panel-active .overlay-left {
                transform: translateX(0);
            }

            .overlay-right {
                right: 0;
                transform: translateX(0);
            }

            .container.right-panel-active .overlay-right {
                transform: translateX(20%);
            }

            .social-container {
                margin: 20px 0;
            }

            .social-container a {
                border: 1px solid #DDDDDD;
                border-radius: 50%;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                margin: 0 5px;
                height: 40px;
                width: 40px;
            }

            footer {
                background-color: #222;
                color: #fff;
                font-size: 14px;
                bottom: 0;
                position: fixed;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 999;
            }

            footer p {
                margin: 10px 0;
            }

            footer i {
                color: red;
            }

            footer a {
                color: #3c97bf;
                text-decoration: none;
            }

            /*Background*/
            @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

            *{
                margin: 0px;
                padding: 0px;
            }

        


            .context {
                width: 100%;
                position: absolute;
                top:50vh;

            }

            .area{
                background: #7d97a5;  
                background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
                width: 100%;
                height:100vh;


            }

            .circles{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            .circles li{
                position: absolute;
                display: block;
                list-style: none;
                width: 20px;
                height: 20px;
                background: rgba(255, 255, 255, 0.2);
                animation: animate 25s linear infinite;
                bottom: -150px;

            }

            .circles li:nth-child(1){
                left: 25%;
                width: 80px;
                height: 80px;
                animation-delay: 0s;
            }


            .circles li:nth-child(2){
                left: 10%;
                width: 20px;
                height: 20px;
                animation-delay: 2s;
                animation-duration: 12s;
            }

            .circles li:nth-child(3){
                left: 70%;
                width: 20px;
                height: 20px;
                animation-delay: 4s;
            }

            .circles li:nth-child(4){
                left: 40%;
                width: 60px;
                height: 60px;
                animation-delay: 0s;
                animation-duration: 18s;
            }

            .circles li:nth-child(5){
                left: 65%;
                width: 20px;
                height: 20px;
                animation-delay: 0s;
            }

            .circles li:nth-child(6){
                left: 75%;
                width: 110px;
                height: 110px;
                animation-delay: 3s;
            }

            .circles li:nth-child(7){
                left: 35%;
                width: 150px;
                height: 150px;
                animation-delay: 7s;
            }

            .circles li:nth-child(8){
                left: 50%;
                width: 25px;
                height: 25px;
                animation-delay: 15s;
                animation-duration: 45s;
            }

            .circles li:nth-child(9){
                left: 20%;
                width: 15px;
                height: 15px;
                animation-delay: 2s;
                animation-duration: 35s;
            }

            .circles li:nth-child(10){
                left: 85%;
                width: 150px;
                height: 150px;
                animation-delay: 0s;
                animation-duration: 11s;
            }



            @keyframes animate {

                0%{
                    transform: translateY(0) rotate(0deg);
                    opacity: 1;
                    border-radius: 0;
                }

                100%{
                    transform: translateY(-1000px) rotate(720deg);
                    opacity: 0;
                    border-radius: 50%;
                }

            }
        </style>
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
                    <form action="creationCompte.php" method="POST">
                        <input type='hidden' name='fonctionValeur' value='continueCreationCompte' />
                        <h1>Créer mon compte</h1>
                        <input type="text" name="nom_creationEleve" placeholder="Nom" />
                        <input type="text" name="prenom_creationEleve" placeholder="Prénom" />
                        <input type="email" name="email_creationEleve" placeholder="Entrer votre adresse mail du CESI" />
                        <input type="submit" class="button"  value="Créer un compte" />
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

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    $(document).ready(function () {
        $('#btnConnexionClient').on('click', function ()
        {
            testConnexionClient();
        });
    });

    function testConnexionClient()
    {
        $.ajax({
            url: '../controleurs/EleveControlleur.php',
            data: $('#formulaireConnexionClient').serialize(),
            type: 'POST',
            dataType: 'json',
            timeout: 3000,
            success: function (data) {
                console.log(data);
                if (data) {
                    document.location.href = "../vues/index.php";
                } else {
                    $('#containerAlert').empty();
                    $('#containerAlert').append('<div class="w3-panel w3-red w3-display-container w3-card-4"><span id="btnAlertClose" onclick="this.parentElement.style.display=\'none\'"class="w3-button w3-large w3-display-topright">&times;</span><p>Votre email et votre mot de passe ne nous permettent pas de vous connecter.</p></div>');
                    $('#containerAlert').show(200);
                }
            },
            error: function () {
                $('#containerAlert').empty();
                $('#containerAlert').append('<div class="w3-panel w3-red w3-display-container w3-card-4"><span id="btnAlertClose" onclick="this.parentElement.style.display=\'none\'"class="w3-button w3-large w3-display-topright">&times;</span><p>Un problème est survenue sur le site merci de recharger la page et de réessayer.</p></div>');
                $('#containerAlert').show(200);
            }
        });
    }

</script>
