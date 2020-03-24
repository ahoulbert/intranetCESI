

function notify() {
    Notiflix.Notify.Init({ position: "right-bottom", });
    Notiflix.Notify.Success("Le groupe a bien été créé.");
}
function changeGroupe(id, event) {
    event.preventDefault();

    if (id == 'past') {
        $('#mesGroupes').hide();
        $('#GroupeSuggere').show();
    } else if (id == 'coming') {
        $('#GroupeSuggere').hide();
        $('#mesGroupes').show();
    }
}

function updateGroupe(id, event) {
    event.preventDefault();

    var estJoin = id.split('-')[0];
    var idGroupe = id.split('-')[1];
   
    $.ajax({
        url: '../../controleurs/GroupeControleur.php',
        data: {
            "idGroupe" : idGroupe,
            "estJoin" : estJoin,
            "mailCESI" : $('#mailCESI').val(),
            "fonctionValeur" : 'updateGroupe'
        },
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
            console.log(data);
            if(estJoin == 'join') {
                $('#mesGroupes').append($('#suggest-' + idGroupe));
                $('#mesGroupes').find('#mesBouttons-' + idGroupe).show();
                $('#btn-join-' + idGroupe).hide();
                $('#suggest-' + idGroupe).attr('id', 'my-group-' + idGroupe);
            } else if (estJoin == 'quit') {
                $('#GroupeSuggere').append($('#my-group-' + idGroupe));
                $('#mesBouttons-' + idGroupe).hide();
                $('#btn-join-' + idGroupe).show();
                $('#my-group-' + idGroupe).attr('id', 'suggest-' + idGroupe);
            }
        },
        error: function (e) {
            console.log(e);
        }
    });

}