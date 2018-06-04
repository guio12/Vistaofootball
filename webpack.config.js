    var Encore = require('@symfony/webpack-encore');

    Encore
        .setOutputPath('web/build/')
        .setPublicPath('/web')
        .addEntry('app', './assets/js/app.js')
        .addEntry('contact', './assets/js/contact.js')
        .addEntry('style', './assets/scss/main.scss')
        .addEntry('connexion', './assets/scss/connexion.scss')
        .addEntry('logo_connexion', './assets/images/Vistao football bk.png')
        .cleanupOutputBeforeBuild()
        .enableBuildNotifications()
        .autoProvidejQuery()
        .enableSassLoader();


    module.exports = Encore.getWebpackConfig();
