// require jQuery normally
const $ = require('jquery');
require('jquery-ui');
require('webpack-jquery-ui');

// create global $ and jQuery variables
global.$ = global.jQuery = $;


// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap-sass');

$( document ).ready(function() {
console.log('test');
let un = 0;
let deux = 0;
let trois = 0;
let quatre = 0;
let cinq = 0;
let six = 0;
let sept = 0;
let huit = 0;
let neuf = 0;
let dix = 0;
let onze = 0;
let douze = 0;
let treize = 0;
let quatorze = 0;
let quinze = 0;
let seize = 0;

$.post( "recupAjax", function(data) {
  obj = JSON.parse(data);
  let recup = obj[0];
  let joueur = obj[1][0];
  console.log(joueur);

  recup['nous'].forEach(function(element) {
    switch (element) {
      case 1: un++
      console.log(un);
        break;
      case 2: deux++
        break;
      case 3: trois++
        break;
      case 4: quatre++
        break;
      case 5: cinq++
        break;
      case 6: six++
        break;
      case 7: sept++
        break;
      case 8: huit++
        break;
      case 9: neuf++
        break;
      case 10: dix++
        break;
      case 11: onze++
        break;
      case 12: douze++
        break;
      case 13: treize++
        break;
      case 14: quatorze++
        break;
      case 15: quinze++
        break;
      case 16: seize++
        break;

      default:

    }
  });
var data = {
    1: un,
    2: deux,
    3: trois,
    4: quatre,
    5: cinq,
    6: six,
    7: sept,
    8: huit,
    9: neuf,
    10: dix,
    11: onze,
    12: douze,
    13: treize,
    14: quatorze,
    15: quinze,
    16: seize,
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
        <span>' + joueur['joueur'+i]; + '</span>\
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

});
});
