$("#changePicture").on("click", function() {
    $("#inputChangePicture").trigger("click");
});

var saveEleve = function(e) {
    e.preventDefault();
    var nom = $('#nom').val();
    var prenom = $('#prenom').val();
    var mail = $('#mail').val();
    var tel = $('#tel').val();
    var nomEntreprise = $('#entreprise').val();
    var villeEleve = $('#ville').val();
    var description = $('#description').val();
    var typeEleve = $('#typeEleve').val();
    var sexe;

    $('input[name="sexe"]').each(function() {
        if($(this).is(':checked')){
            sexe = $(this).val();
        }
    })

    Notiflix.Notify.Init({position:"right-bottom",});

    $.ajax({
        url: '__DIR__../../../controleurs/EleveControlleur.php',
        data: {
            "nom" : nom,
            "prenom" : prenom,
            "mail" : mail,
            "tel" : tel,
            "nomEntreprise" : nomEntreprise,
            "villeEleve" : villeEleve,
            "description" : description,
            "typeEleve" : typeEleve,
            "sexe" : sexe,
            "fonctionValeur" : "saveEleve"
        },
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
            console.log(data);
            Notiflix.Notify.Success('Modification enregistrées');
        },
        error: function (e) {
            console.log(e);
            Notiflix.Notify.Failure('Une erreur est survenue');
        }
    });
}