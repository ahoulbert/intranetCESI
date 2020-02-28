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

    $('#btnCreationCompte').on('click', function ()
    {
        testAdresseMailCreationCompte();
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
            $('#containerAlert').append('<div class="w3-panel w3-red w3-display-container w3-card-4"><span id="btnAlertClose" onclick="this.parentElement.style.display=\'none\'"class="w3-button w3-large w3-display-topright">&times;</span><p>Un probl√®me est survenue sur le site merci de recharger la page et de r√©essayer.</p></div>');
            $('#containerAlert').show(200);
        }
    });
}

function testAdresseMailCreationCompte()
{
    $.ajax({
        url: '../controleurs/EleveControlleur.php',
        data: $('#preFormulaireCreationCompte').serialize(),
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
            if (!data) {
                
                document.location.href = getDonneesCreationCompte();
            } else {
                $('#containerAlert').empty();
                $('#containerAlert').append('<div class="w3-panel w3-red w3-display-container w3-card-4"><span id="btnAlertClose" onclick="this.parentElement.style.display=\'none\'"class="w3-button w3-large w3-display-topright">&times;</span><p>Votre adresse mail est dÈj‡ existante ou elle n\'est pas une adresse mail cesi.</p></div>');
                $('#containerAlert').show(200);
            }
        },
        error: function () {

        }
    });
}

function getDonneesCreationCompte()
{
   return "../vues/creationCompte.php?Prenom="+$('#prenomCreation').val()+"&Nom="+$('#nomCreation').val()+"&mail="+$('#mailCreation').val();
}