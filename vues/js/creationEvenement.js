$(document).ready(function(){
    flatpickr(".datepicker", {
        "locale" : "fr",
        dateFormat: "d-m-Y",
        minDate: "today"
    });
});