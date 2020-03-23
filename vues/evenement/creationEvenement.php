<html lang='fr'>

<head>
    <title>Création d'un événement - Intranet CESI</title>
    <?php
    include_once './ressources/header.php';
    ?>
    <style>
        /*Background*/
        @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Exo', sans-serif;
        }


        .context {
            width: 100%;
            position: absolute;
            top: 50vh;

        }

        .area {
            background: #7d97a5;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            height: 160vh;


        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        .button-style {
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


        .obligatoire {
            color: red;
        }

        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }
    </style>
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
                        <h4 class="title">Formulaire de création d'un événement</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <img src="images/logoCesi.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 80px;">
                        </div>
                        <form action="../controleurs/EleveControlleur.php" method="POST">
                            <input type="hidden" name="fonctionValeur" value="creationCompte" />
                            <div class="form-row m-b-55">
                                <div class="name">L'événement <span class="obligatoire">*</div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <input placeholder="Titre de l'événement" class="input--style-5" type="text" required name="nom"/>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <textarea placeholder="Veuillez décrire l'événement" cols="50" rows="4" required name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Date <span class="obligatoire">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input placeholder="Date de l'événement" class="input--style-5" required type="date" name="mailCESI"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Lieu de l'événement <span class="obligatoire">*</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="text" name="place" class="input--style-5" required placeholder="Veuillez entrer le lieu de l'événement"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row m-b-55" style="padding-top: 40px;">
                                <div class="name"></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <input type="submit" class="button-style" value="Créer un événement" />
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <input  class=" button-style" onclick="history.go(-1)" type="button" value="Retour" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        var emailLargeur = $('#emailCesiText').innerWidth();
        $('#descriptionTextarea').css('width', emailLargeur + 'px');
    });
</script>