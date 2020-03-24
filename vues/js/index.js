

// Accordion
function deplierAccordeon(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
      x.previousElementSibling.className += " w3-theme-d1";
    } else {
      x.className = x.className.replace("w3-show", "");
      x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
  }

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }


  function removeEvent(idElement, e) {
    e.preventDefault();

    idEvent = idElement.split('-')[1];

    $.ajax({
      url: '__DIR__../../../../../intranetCESI/controleurs/EvenementControleur.php',
      data: {
          "idEvent" : idEvent,
          "estInterese" : 0,
          "mail_cesi" : $('#mailCESI').val(),
          "fonctionValeur" : 'updateInteresement'
      },
      type: 'POST',
      dataType: 'json',
      timeout: 3000,
      success: function (data) {
          console.log(data);

          $('#text-event-' + idEvent).fadeOut(300, function(){
            $('#text-event-' + idEvent).remove();

            if($('#event').find('p').length < 1) {
              $('#event').append("<p>Vous n'avez pas d'événement(s)</p>");
            }
          })
          
      },
      error: function (e) {
          console.log(e);
      }
  });
  }

