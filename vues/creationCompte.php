<html lang='fr'>
    <head>
        <title>Connexion - Intranet CESI</title>
        <?php
        include_once './ressources/header.php';
        ?>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Cookie|Raleway:300,700,400);
            *{
                box-sizing: border-box;
                font-size: 1em;
                margin: 0;
                padding: 0;
            }
            body{
                background: url('http://tfgms.com/sandbox/dailyui/bg-1.jpg') center no-repeat;
                background-size: cover;
                color: #333;
                font-size: 18px;
                font-family: 'Raleway', sans-serif;
            }
            .container{
                border-radius: 0.5em;
                box-shadow: 0 0 1em 0 rgba(51,51,51,0.25);
                display: block;
                max-width: 480px;
                overflow: hidden;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                padding: 2em;
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 1;
                width: 98%;
            }
            .container:before{
                background-color: white;
                background-size: cover;
                content: '';
                -webkit-filter: blur(10px);
                filter: blur(10px);
                height: 100vh;
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: -1;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                width: 100vw;
            }
            .container:after{
                background: rgba(255,255,255,0.6);
                content: '';
                display: block;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                width: 100%;
            }
            form button.submit{
                background: rgba(255,255,255,0.25);
                border: 1px solid #333;
                line-height: 1em;
                padding: 0.5em 0.5em;
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
            }
            form button:hover,
            form button:focus,
            form button:active,
            form button.loading{
                background: #333;
                color: #fff;
                outline: none;
            }
            form button.success{
                background: #27ae60;
                border-color: #27ae60; 
                color: #fff;
            }
            @-webkit-keyframes spin{
                from{ transform: rotate(0deg); }
                to{ transform: rotate(360deg); }
            }
            @keyframes spin{
                from{ transform: rotate(0deg); }
                to{ transform: rotate(360deg); }
            }
            form button span.loading-spinner{
                -webkit-animation: spin 0.5s linear infinite;
                animation: spin 0.5s linear infinite;
                border: 2px solid #fff;
                border-top-color: transparent;
                border-radius: 50%;
                display: inline-block;
                height: 1em;
                width: 1em;
            }

            form label{
                border-bottom: 1px solid #333;
                display: block;
                font-size: 1.25em;
                margin-bottom: 0.5em;
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
            }
            form label.col-one-half{
                float: left;
                width: 50%;
            }
            form label input{
                background: none;
                border: none;
                line-height: 1em;
                font-weight: 300;
                padding: 0.125em 0.25em;
                width: 100%;
            }
            form label input:focus{
                outline: none;
            }
            form label input:-webkit-autofill{
                background-color: transparent !important;
            }
            form label span.label-text{
                display: block;
                font-size: 0.5em;
                font-weight: bold;
                padding-left: 0.5em;
                text-transform: uppercase;
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
            }
            form label.checkbox{
                border-bottom: 0;
                text-align: center;
            }
            form label.checkbox input{
                display: none;
            }
            form label.checkbox span{
                font-size: 0.5em;
            }
            form label.checkbox span:before{
                content: '\e157';
                display: inline-block;
                font-family: 'Glyphicons Halflings';
                font-size: 1.125em;
                padding-right: 0.25em;
                position: relative;
                top: 1px;
            }
            form label.checkbox input:checked + span:before{content: '\e067';}
            form label.invalid{border-color: #c0392b !important;}
            form label.invalid span.label-text{color: #c0392b;}
            form label.password{position: relative;}
            form label.password button.toggle-visibility{
                background: none;
                border: none;
                cursor: pointer;
                font-size: 0.75em;
                line-height: 1em;
                position: absolute;
                top: 50%;
                right: 0.5em;
                text-align: center;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
            }
            form label.password button.toggle-visibility:hover,
            form label.password button.toggle-visibility:focus,
            form label.password button.toggle-visibility:active{
                color: #000;
                outline: none;
            }
            form label.password button.toggle-visibility span{vertical-align: middle;}

            h1{
                font-size: 2em;
                margin: 0 0 0.5em 0;
                text-align: center;
                font-family: "Open Sans", sans-serif;
            }
            h1 img{
                height: auto;
                margin: 0 auto;
                max-width: 240px;
                width: 100%;
            }
            html{
                font-size: 18px;
                height: 100%;
            }

            .text-center{
                text-align: center;
            }
            /*Background*/
            @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

            *{
                margin: 0px;
                padding: 0px;
            }

            body{
                font-family: 'Exo', sans-serif;
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
            <div class="container">
                <header>
                    <h1 class="text-center">Créer un compte</h1>
                </header>

                <form class="registration-form">
                    <label class="col-one-half" style="border-right: 1px solid #333;">
                        <span class="label-text">Prénom</span>
                        <input type="text" name="firstName">
                    </label>
                    <label class="col-one-half">
                        <span class="label-text">Nom</span>
                        <input type="text" name="lastName">
                    </label>
                    <label>
                        <span class="label-text">Email CESI *</span>
                        <input id='emailCesiText' type="text" name="email" required/>
                    </label>
                    <label class="password">
                        <span class="label-text">Mot de passe</span>
                        <input type="password" name="password">
                    </label>
                    <label class="password">
                        <span class="label-text">Confirmation mot de passe</span>
                        <input type="password" name="password">
                    </label>
                    <label class="col-one-half" style='border-right: 1px solid #333;'>
                        <span class="label-text">Date de naissance</span>
                        <input type="datetime" placeholder='JJ/MM/AAAA'/>
                    </label>
                    <label class="col-one-half" >
                        <span class="label-text">Numéro de téléphone</span>
                        <input type="text" name="lastName">
                    </label>
                     <label class="col-one-half" style='border-right: 1px solid #333;'>
                        <span class="label-text">Ville</span>
                        <input type="text"/>
                    </label>
                    <label class="col-one-half" >
                        <span class="label-text">Lien linkedin</span>
                        <input type="url">
                    </label>
                     <label>
                        <span class="label-text">Description </span>
                        <textarea id='descriptionTextarea' maxlength="250" style='resize:none; font-size:0.6em; height:100px;' ></textarea>
                    </label>
                    <div class="text-center">
                        <button class="submit" name="register">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function()
    {
        var emailLargeur=$('#emailCesiText').innerWidth();
        $('#descriptionTextarea').css('width', emailLargeur+'px');
    });
</script>