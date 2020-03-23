function changeEvents(id, event) {
    event.preventDefault();

    if(id == 'past') {
        $('#mesGroupes').hide();
        $('#GroupeSuggere').show();
    } else if (id == 'coming') {
        $('#GroupeSuggere').hide();
        $('#mesGroupes').show();
    }
}

function updateInteresement(id, event) {
    event.preventDefault();

    var idEvent = id.split('-')[0];
    var estInterese = id.split('-')[1];

    $.ajax({
        url: '../../controleurs/GroupeControleur.php',
        data: {
            "idEvent" : idEvent,
            "estInterese" : estInterese,
            "mail_cesi" : $('#mail_cesi').val(),
            "fonctionValeur" : 'updateInteresement'
        },
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
            console.log(data);

            if (data) {
                if(estInterese == 0) {
                    $('#button-' + idEvent).html('Pas intéressé(e)');
                } else {
                    $('#button-' + idEvent).html('Intéressé(e)');
                }
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
}