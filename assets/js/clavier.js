// require jQuery normally
const $ = require('jquery');
require('jquery-ui');
require('webpack-jquery-ui');

// create global $ and jQuery variables
global.$ = global.jQuery = $;


// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap-sass');

var idMatch = $("#IdMatch").val();

$(document).ready(function () {
    grey();


});


/* --------------------------------
*
* Envoi données BDD
*
*-------------------------------- */


function envoiAjax() {

    if (receveur.length == 0) {
        receveur = 0;
    }

    console.log($(".t-time").html());
    temps = $(".t-time").html();
    $.ajax({
            url: 'envoiAjax/' + actionneur + '/' + action + '/' + receveur + '/' + temps,
            type: 'POST',
            data: {actionneur:actionneur, action: action, receveur: receveur, idmatch: idMatch},
            success: function success(statut) {
                console.log("affiche messsage si tout ok");
            }
        }
    );
}

etat = 0;

function grey() {

  $('.joueur').each(function(){
    if ($(this).children("p").html() == "?") {
      $(this).css("filter", "grayscale(100%)");

    }
  });

    if (etat == 0) {

        $('.action').css("filter", "grayscale(100%)");
        $('.actionSPE').css("filter", "grayscale(100%)");
        $('.actionX').css("filter", "grayscale(100%)");
        $('.actionDR').css("filter", "grayscale(100%)");
        $('.actionTC').css("filter", "grayscale(100%)");
        $('.actionF').css("filter", "grayscale(100%)");
        $('.AfTC').css("filter", "grayscale(100%)");
        $('.joueur').css("filter", "grayscale(0%)");

    } else if (etat == 1) {
        $('.action').css("filter", "grayscale(0%)");
        $('.actionSPE').css("filter", "grayscale(0%)");
        $('.actionX').css("filter", "grayscale(0%)");
        $('.actionDR').css("filter", "grayscale(0%)");
        $('.actionTC').css("filter", "grayscale(0%)");
        $('.actionF').css("filter", "grayscale(0%)");
        $('.AfTC').css("filter", "grayscale(0%)");

    } else if (etat == 2) {
        $('.action').css("filter", "grayscale(100%)");
        $('.actionSPE').css("filter", "grayscale(100%)");
        $('.actionX').css("filter", "grayscale(100%)");
        $('.actionDR').css("filter", "grayscale(100%)");
        $('.actionTC').css("filter", "grayscale(100%)");
        $('.actionF').css("filter", "grayscale(100%)");
        $('.AfTC').css("filter", "grayscale(100%)");

    } else if (etat == 4) {
        $('.actionSPE').css("filter", "grayscale(0%)");
        $('.action').css("filter", "grayscale(100%)");
        $('.joueur').css("filter", "grayscale(100%)");
        $('.actionX').css("filter", "grayscale(100%)");
        $('.actionDR').css("filter", "grayscale(100%)");
        $('.actionTC').css("filter", "grayscale(100%)");
        $('.actionF').css("filter", "grayscale(100%)");
        $('.AfTC').css("filter", "grayscale(0%)");

    }
}

var receveur = "";
var actionneur = "";
var action = "";
var actionX = "";
var actionDR = "";
var actionTC = "";


$(".BUT").click(function () {
    action = $(this).attr('value');
    var but = $("#butclub").html();
    var butadv = $("#butadv").html();

    if (actionneur != "0123" && action != "666") {
        but = $("#butclub").html();
        but++;
        $("#butclub").html(but);
    } else if (actionneur == "0123" && action != "666") {

        butadv = $("#butadv").html();
        butadv++;
        $("#butadv").html(butadv);
    } else if (actionneur == "0123" && action == "666") {

        but = $("#butclub").html();
        but++;
        $("#butclub").html(but);
    } else if (actionneur != "0123" && action == "666") {
        butadv = $("#butadv").html();
        butadv++;
        $("#butadv").html(butadv);
    }
});

$(".joueur*").click(function () {
  if ($(this).children("p").html() !== "?") {
    if (etat === 0) {
        actionneur = $(this).attr('value');

        if (actionneur == "0123") {
          actionneurMaillot = $(this).children("p").children("#adversaireCount").html();
        }else {
          actionneurMaillot = $(this).children("p").html();
        }

        $('#resume').html(actionneurMaillot);
        etat = 1;
    } else if (etat === 1 && ($(this).attr('value') !== actionneur) || actionneur == "0123") {
        receveur = $(this).attr('value');

        if (receveur == "0123") {
          receveurMaillot = $(this).children("p").children("#adversaireCount").html();
        }else {
          receveurMaillot = $(this).children("p").html();
        }


        if (receveur.length) {
            if (action.length == false) {
                action = "1";
            }
            $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneurMaillot + "</span>" + " PASSE À JOUEUR " + "<span style=\"color:#F00\">" + receveurMaillot + "</span>");
            envoiAjax();
        }
        actionneur = receveur;
        actionneurMaillot = receveurMaillot;
        receveurMaillot = "";
        receveur = "";
        etat = 1;
    } else if (etat === 2 && ($(this).attr('value') !== actionneur || actionneur == "0123")) {
        receveur = $(this).attr('value');
        if (receveur == "0123") {
          receveurMaillot = $(this).children("p").children("#adversaireCount").html();
        }else {
          receveurMaillot = $(this).children("p").html();
        }
        $('#resume').append(" AU JOUEUR " + "<span style=\"color:#F00\">" + receveurMaillot + "</span>");

        if (receveur.length) {
            if (action.length == false) {
                action = "000";
            }
            envoiAjax();
        }
        actionneur = receveur;
        actionneurMaillot = receveurMaillot;
        receveurMaillot = "";
        receveur = "";
        action = "";
        etat = 1;
    }
    grey();
}
});

$(".action*").click(function () {

    if (etat === 1) {
        action = $(this).attr('value');
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneurMaillot + "</span>" + " " + $(this).children().html());
        etat = 2;
    }
    grey();
});

$(".actionSPE*").click(function () {
    if (etat === 4) {
        action = $(this).attr('value');
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneurMaillot + "</span>" + " " + actionTC + " " + actionSPE);
        envoiAjax();
        grey();
        etat = 0;
    }
});

$(".actionX*").click(function () {
    if (etat === 1) {
        action = $(this).attr('value');
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneurMaillot + "</span>" + " : " + $(this).children().html());
        envoiAjax();
        etat = 0;
        action = "";
        actionX = "";
        actionTC = "";
    }
    grey();
});
$(".actionDR").click(function () {
    if (etat === 1) {
        action = $(this).attr('value');
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneurMaillot + "</span>" + " " + $(this).children().html());
        envoiAjax();

    }
    grey();
});


/* --------------------------------
*
* Highlight pad
*
*-------------------------------- */

$(".highlight_pads*").click(function () {
    var button_color = $(this).data('color');
    $(this).effect("highlight", {color: button_color}, 160);

});

/* --------------------------------
*
* Adverse pad counter
*
*-------------------------------- */

var counter = 0;

$('.counter-click').on('click', function () {
        counter++;
        $('.counter-count').text(counter);
    }
);

$('.reset-counter').on('click', function () {
        counter = 0;
        $('.counter-count').text(counter);
    }
);


/* --------------------------------
*
* Timer
*
*-------------------------------- */


$('.fin-match').on('click', function () {
    clearInterval(timerInt);


});
$(document).ready(function () {
grey();
    var timer = true,
        mmin = 200,
        min = 0,
        sec = 0,
        perc = 612,
        percm = perc;

    startTimer(timer);
    $('.o-opt-btn.display').html(mmin);
    $('.t-time').text(min + ':0' + sec);
    $('.oop').text('of ' + mmin);

    // Pause
    $('.pause-btn').on('click', function () {
        startTimer(timer);
    });


    $('.o-opt-btn').on('click', function () {
        if ($(this).hasClass('b-inc')) {
            if (mmin < 200)
                mmin++;
        } else if ($(this).hasClass('b-dec')) {
            if (mmin > 1)
                mmin--;
        }
        $('.o-opt-btn.display').html(mmin);
        $('.oop').text('of ' + mmin);
    });

    function startTimer(func) {
        timer = !timer;
        if (func == true) {

            $('.btn-mi-temps p span').removeClass('glyphicon-play').addClass('glyphicon-pause');
            // Démarre l'exécution du timer :
            timerInt = setInterval(function () {
                sec++;
                perc = perc - (percm / 60);

                if (sec >= 60) {
                    sec = 0;
                    min++;
                    if (!(min >= mmin))
                        perc = 612;
                }

                if (sec <= 9)
                    sec = '0' + sec;

                $('.c-c').css('stroke-dashoffset', perc);
                $('.t-time').text(min + ':' + sec);

                if (min >= mmin) {
                    timer = !timer;
                    min = 0;
                    sec = 0;
                    perc = 612;
                    $('.btn-mi-temps span').removeClass('glyphicon-pause').addClass('glyphicon-play');
                    // Arrête l'exécution du timer :
                    clearInterval(timerInt);

                }
            }, 1000);
        } else {
            // Arrête l'exécution du timer :
            clearInterval(timerInt);
            $('.btn-mi-temps span').removeClass('glyphicon-pause').addClass('glyphicon-play');

        }
    }
});
