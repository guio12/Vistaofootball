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

        // will output as web/build/connexion.css
        .addEntry('inscription', './assets/scss/inscription.scss')

        // will output as web/build/accueil.css
        .addEntry('style_accueil', './assets/scss/accueil.scss')

        // will output as web/build/clavier.js
        .addEntry('accueil', './assets/js/accueil.js')

            // will output as web/build/images/...png
        .addEntry('logo_connexion', './assets/images/logo_connexion.png')

        // will output as web/build/images/...png
        .addEntry('logo_header', './assets/images/logo_header.png')

        // will output as web/build/images/...png
        .addEntry('gestion_equipe', './assets/images/gestion_equipe.jpg')

        // will output as web/build/images/...png
        .addEntry('lancer_match', './assets/images/lancer_match.jpg')

        // will output as web/build/images/...png
        .addEntry('stats_globales', './assets/images/stats_globales.jpg')

            // will output as web/build/clavier.js
        .addEntry('clavier', './assets/js/clavier.js')
            // will output as web/build/clavier.js
        .addEntry('avantMatch', './assets/scss/avantMatch.scss')

            // will output as web/build/style_clavier.css
        .addEntry('style_clavier', './assets/scss/clavier.scss')

        // will output as web/build/menu.css
        .addEntry('menu', './assets/scss/menu.css')

        // will output as web/build/stats.css
        .addEntry('stats', './assets/scss/statsgenerales.scss')

        // will output as web/build/tirs.css
        .addEntry('tirs', './assets/scss/tirs.scss')

        // will output as web/build/possession.css
        .addEntry('possession', './assets/scss/possession.scss')

        // will output as web/build/recuperation.css
        .addEntry('style_recuperation', './assets/scss/recuperation.scss')

        // will output as web/build/recuperation.js
        .addEntry('recuperation', './assets/js/recuperation.js')

        // will output as web/build/cpa.scss
        .addEntry('cpa', './assets/scss/cpa.scss')

        // will output as web/build/admin_equipes.css
        .addEntry('admin_equipes', './assets/scss/admin_equipes.scss')

        // will output as web/build/images/logo_vistao.png
        .addEntry('logo_vistao', './assets/images/logo_vistao.png')

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
