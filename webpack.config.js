    var Encore = require('@symfony/webpack-encore');

    Encore
            // directory where should all compiled assets will be stored
        .setOutputPath('web/build/')

            // what's the public path to this directory
            // the linked resources in generated files (like url to fonts in css files) are relative when I do this.
        .setPublicPath('./')
        .setManifestKeyPrefix('build/')

            // will output as web/build/app.js
        .addEntry('app', './assets/js/app.js')

            // will output as web/build/app.js
        .addEntry('contact', './assets/js/contact.js')

            // will output as web/build/style.css
        .addEntry('style', './assets/scss/main.scss')

            // will output as web/build/connexion.css
        .addEntry('connexion', './assets/scss/connexion.scss')

            // will output as web/build/images/...png
        .addEntry('logo_connexion', './assets/images/Vistao football bk.png')

            // will output as web/build/clavier.js
        .addEntry('clavier', './assets/js/clavier.js')

            // will output as web/build/style_clavier.css
        .addEntry('style_clavier', './assets/scss/clavier.scss')

        // will output as web/build/menu.css
        .addEntry('menu', './assets/scss/menu.css')

        // will output as web/build/stats.css
        .addEntry('stats', './assets/scss/statsgenerales.css')

            // empty the outputPath dir before each build
        .cleanupOutputBeforeBuild()

            // show OS notifications when builds finish/fail
        .enableBuildNotifications()

            // allow sass/scss files to be processed
        .enableSassLoader()

            // allows legacy applications to use $/jQuery as a global variable
        .autoProvidejQuery()

            // this creates a 'jquery_jqueryUi.js' file with jquery and the jQuery UI module
        .createSharedEntry('jquery_jqueryUi', ['jquery', 'jquery-ui']);


        // export the final configuration
    module.exports = Encore.getWebpackConfig();
