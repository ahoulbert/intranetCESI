changerEvent();//Appel de la fonction changerEvent toutes les minutes
setInterval(changerEvent, 60000);

//Changer les infos dans évènements
function changerEvent()
{
    $.ajax({
        url : '../controleurs/EvenementControleur.php',
        type : 'POST',
        dataType : 'html',
        data : {'fonctionValeur' : 'getEventRand'},
        success : function(code_html, statut){
            $('#evenementAffichage').empty();
            $('#evenementAffichage').append(code_html);
        }
    });
}