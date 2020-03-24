ScrollReveal().reveal('.post')

var updateLike = function(idElement, e) {
    e.preventDefault();

    var idPost = idElement.split('-')[0];
    var isLike = idElement.split('-')[1];

    $.ajax({
        url: '__DIR__../../../controleurs/PostControleur.php',
        data: {
            "idPost" : idPost,
            "isLike" : isLike,
            "mailCESI" : $('#mailCESI').val(),
            "fonctionValeur" : 'updateLike'
        },
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
            // Changement de la couleur du pouce et de l'id de lelement
            if(isLike == 0) {
                $('#' + idElement).find('i').removeAttr('style');
                $('#' + idElement).attr('id', idPost + "-1");
                $('#nbLikes-' + idPost).html('<i class="fa fa-thumbs-up"></i> ' + (parseInt($('#nbLikes-'+ idPost).text())- 1));
            } else if(isLike == 1) {
                $('#' + idElement).find('i').attr('style', 'color:#419ff6');
                $('#' + idElement).attr('id', idPost + "-0");
                $('#nbLikes-' + idPost).html('<i class="fa fa-thumbs-up"></i> ' + (parseInt($('#nbLikes-' + idPost).text())+ 1));
            }
            
        },
        error: function (e) {
            console.log(e);
        }
    });
}