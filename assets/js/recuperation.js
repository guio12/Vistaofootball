// require jQuery normally
const $ = require('jquery');
require('jquery-ui');
require('webpack-jquery-ui');

// create global $ and jQuery variables
global.$ = global.jQuery = $;


// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap-sass');



var data = {
    1: 56,
    2: 33,
    3: 100,
    4: 98,
    5: 100,
    6: 54,
    7: 80,
    8: 90,
    9: 90,
    10: 90,
    11: 90,
    12: 90,
    13: 90,
    14: 90,
    15: 50,
    16: 60,
}

var maxValue = 0
for (var i in data) {
    if (data[i] > maxValue) {
        maxValue = data[i]
    }
}

maxValue = Math.ceil((maxValue / 10) * 1.1) * 10
var halfValue = maxValue / 2
$('.max').html('<span>' + maxValue + '</span>')
$('.half').html('<span>' + halfValue + '</span>')

var barsHtml = ''
for (var i in data) {
    var num = data[i]
    var percent = (num / maxValue * 100)
    barsHtml += '\
    <li>\
        <div data-height="' + percent + '" class="bar">\
            <div class="per">' + num + '</div>\
        </div>\
        <span>' + i.toUpperCase() + '</span>\
    </li>'
}
$('.bars').html(barsHtml)

setTimeout(function () {
    $(".bars li .bar").each(function (key, bar) {
        var $this = $(this)
        $this.css('height', $this.attr('data-height') + '%')
    })
}, 0)


/**ntm**/

var data = {
    a: 56,

}

var maxValue = 0
for (var i in data) {
    if (data[i] > maxValue) {
        maxValue = data[i]
    }
}

maxValue = Math.ceil((maxValue / 10) * 1.1) * 10
var halfValue = maxValue / 2
$('.max').html('<span>' + maxValue + '</span>')
$('.half').html('<span>' + halfValue + '</span>')

var barsHtml = ''
for (var i in data) {
    var num = data[i]
    var percent = (num / maxValue * 100)
    barsHtml += '\
    <li>\
        <div data-height="' + percent + '" class="bari">\
            <div class="peri">' + num + '</div>\
        </div>\
        <span>' + i.toUpperCase() + '</span>\
    </li>'
}
$('.barsi').html(barsHtml)

setTimeout(function () {
    $(".barsi li .bari").each(function (key, bari) {
        var $this = $(this)
        $this.css('height', $this.attr('data-height') + '%')
    })
}, 0)