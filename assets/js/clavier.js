// require jQuery normally
const $ = require('jquery');
require('jquery-ui');
require('webpack-jquery-ui');

// create global $ and jQuery variables
global.$ = global.jQuery = $;


// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap-sass');


$(document).ready(function () {
    console.log('Clavier Vistao');
});




/* --------------------------------
 *
 * Envoi données BDD
 *
 *-------------------------------- */

function envoiAjax() {

    $.ajax({
        url: 'envoiAjax/'+ actionneur +'/'+ action + '/' + receveur,
        type: 'POST',
        data: { joueur_action: actionneur, action_id: action, joueur_receveur: receveur },
        success: function success(statut) { console.log("affiche messsage si tout ok")
        },

        error: function error(resultat, statut, erreur) {console.log('message si tout cassé')

        }

    });
};

etat = 0;

console.log(etat);

var receveur = "";
var actionneur = "";
var action = "";
var actionX = "";
var actionDR = "";
var actionTC = "";

$(".joueur*").click(function () {
    if (etat === 0) {

        actionneur = $(this).attr('value');
        $('#resume').html(actionneur);
        etat = 1;

    } else if (etat === 1 && ($(this).attr('value') !== actionneur) || actionneur == "Adversaire") {

        receveur = $(this).attr('value');


        if (receveur.length) {
            if (action.length == false) {
                action = "000";
            }
            console.log(actionneur + " " + action + " " + receveur);
             $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneur + "</span>" + " PASSE À JOUEUR " + "<span style=\"color:#F00\">" + receveur +"</span>");


            envoiAjax();
        }

        actionneur = receveur;
        receveur = "";

        etat = 1;
    } else if (etat === 2 && ($(this).attr('value') !== actionneur || actionneur == "Adversaire")) {

        receveur = $(this).attr('value');
        $('#resume').append(" AU JOUEUR "+ "<span style=\"color:#F00\">" + receveur + "</span>");

        if (receveur.length) {
            if (action.length == false) {
                action = "000";
            }
            console.log(actionneur + " " + action + " " + receveur);
            envoiAjax();
        }

        actionneur = receveur;
        receveur = "";
        action = "";
        etat = 1;
    }

});


$(".action*").click(function () {

    if (etat === 1) {

        action = $(this).attr('value');
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneur + "</span>" + " " + $(this).children().html());
        etat = 2;

    }
});

$(".actionSPE*").click(function () {
    if (etat === 4) {

        actionSPE = $(this).attr('value');
        console.log(actionneur + " " + actionTC + " " + actionSPE);
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneur + "</span>" + " " + actionTC + " " + actionSPE);
        envoiAjax();
        actionTC = "";
        etat = 0;
    }
});

$(".actionX*").click(function () {
    if (etat === 1) {
        actionX = $(this).attr('value');
        console.log(actionneur + " " + actionX);
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneur + "</span>" + " : " + $(this).children().html());
        envoiAjax();
        etat = 0;
        action = "";
        actionX = "";
        actionTC = "";

    }
});


$(".actionDR").click(function () {
    if (etat === 1) {

        actionDR = $(this).attr('value');
        console.log(actionneur + " " + actionDR);
        $('#resume').html("JOUEUR " + "<span style=\"color:#F00\">" + actionneur + "</span>" + " " + $(this).children().html());
        envoiAjax();
        etat = 0;
    }
});
$(".actionTC").click(function () {
    console.log(etat);
    if (etat === 1 && actionTC.length == 0) {

        actionTC = $(this).attr('value');
        etat = 4;
    }
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

var counter = 0

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


$(document).ready(function () {
    var timer = 'true',
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
        if (func) {

            $('.pause-btn span').removeClass('glyphicon-play').addClass('glyphicon-pause');
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
                    $('.pause-btn span').removeClass('glyphicon-pause').addClass('glyphicon-play');
                    clearInterval(timerInt);

                }
            }, 1000);
        } else {
            clearInterval(timerInt);
            $('.pause-btn span').removeClass('glyphicon-pause').addClass('glyphicon-play');

        }
    }

});
