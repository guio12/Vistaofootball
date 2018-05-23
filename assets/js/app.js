var $ = require('jquery');
// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap-sass');

$(document).ready(function () {
    console.log("ok, JQuery fonctionne !");
});

console.log('Bienvenue sur WebPack!')

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});