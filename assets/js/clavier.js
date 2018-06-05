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
 * Highlight pad
 *
 *-------------------------------- */

$("#pads*").click(function () {
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

$('.reset').on('click', function () {
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
// Restart
    $('.repeat-btn').on('click', function () {
        min = 0;
        sec = 0;
        perc = 612;
        $('.c-c').css('stroke-dashoffset', perc);
        $('.t-time').text(min + ':0' + sec);
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

/* --------------------------------
 *
 * Modal Window
 *
 *-------------------------------- */

$(document).ready(function () {
    $("a.faute").click(function () {
        $("#popup").fadeToggle("slow");

    });

});

$(document).ready(function () {
    $("a.but").click(function () {
        $("#popup2").fadeToggle("slow");

    });

});

$(document).ready(function () {
    $("a.mi-temps").click(function () {
        $("#popup3").fadeToggle("slow");

    });

});

$(document).ready(function () {
    $("a.fin-match").click(function () {
        $("#popup4").fadeToggle("slow");

    });

});