$("#changePicture").on("click", function(event) {
    event.preventDefault();
    $("#inputChangePicture").trigger("click");
});

var saveEleve = function(e) {
    e.preventDefault();

    $('input[name="sexe"]').each(function() {
        if($(this).is(':checked')){
            sexe = $(this).val();
        }
    })

    Notiflix.Notify.Init({position:"right-bottom",});

    $.ajax({
        url: '__DIR__../../../controleurs/EleveControlleur.php',
        data: {
            "nom" : $('#nom').val(),
            "prenom" : $('#prenom').val(),
            "mail" : $('#mail').val(),
            "tel" : $('#tel').val(),
            "nomEntreprise" : $('#entreprise').val(),
            "villeEleve" : $('#ville').val(),
            "description" : $('#description').val(),
            "typeEleve" : $('#typeEleve').val(),
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

$("#inputChangePicture").on('change', function(){
    var formdataToSend = new FormData($('#formImgProfil')[0]);
    formdataToSend.append("mailCesi", $('#mail').val());
    formdataToSend.append("fonctionValeur", "uploadImgProfil");

    console.log($('#formImgProfil'))

    $.ajax({
        url: '__DIR__../../../controleurs/EleveControlleur.php',
        data: formdataToSend,
        type: 'POST',
        dataType: 'json',
        contentType : false,
        processData : false,
        cache : false,
        timeout: 3000,
        success: function (data) {
            console.log(data);
            $('#avatarEleve').attr("src", "data:image/" + data.imgType +";base64, " + data.imgProfil);
        },
        error: function (e) {
            console.log(e);
        }
    });
});