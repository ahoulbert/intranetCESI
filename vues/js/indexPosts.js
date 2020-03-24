ScrollReveal().reveal('.post', { delay: 200 })

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

var newPost = function(e) {
    e.preventDefault();

    var clonePost = $('#new-post-container').clone(false);

    if($('#new-post').val() != "") {
        $.ajax({
            url: '__DIR__../../../controleurs/PostControleur.php',
            data: {
                "mailCESI" : $('#mailCESI').val(),
                "description" : $('#new-post').val(),
                "fonctionValeur" : 'newPost'
            },
            type: 'POST',
            dataType: 'json',
            timeout: 3000,
            success: function (data) {
                console.log(data);
                $(clonePost).removeAttr('style');
                $(clonePost).find('#new-nblike-1').attr('id', data.idPost + '-1');
                $(clonePost).find('#nbLikes-new').attr('id', 'nbLikes-' + data.idPost);
                $(clonePost).find('#new-text').html(data.textPost + '');
                $(clonePost).removeAttr('id');

                $('#blankPost').after(clonePost);

                $('#new-post').val('');
            },
            error: function (e) {
                console.log(e);
            }
        });
    } else {
        $('#new-post').attr('style', 'border: 1px solid #f00!important;overflow:auto;resize:none');
        setTimeout(function(){ 
            $('#new-post').attr('style', 'overflow:auto;resize:none'); 
        }, 3000);
    }
}