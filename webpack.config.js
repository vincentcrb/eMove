var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    // JS
    // .addEntry('js/core/bootstrap', './assets/js/core/bootstrap.min.js')
    // .addEntry('js/core/jquery', './assets/js/core/jquery.3.2.1.min.js')
    // .addEntry('js/core/popper', './assets/js/core/popper.min.js')
    // .addEntry('js/plugins/bootstrap-datetimepicker', './assets/js/plugins/bootstrap-datetimepicker.min.js')
    // .addEntry('js/plugins/bootstrap-selectpicker', './assets/js/plugins/bootstrap-selectpicker.js')
    // .addEntry('js/plugins/bootstrap-switch', './assets/js/plugins/bootstrap-switch.js')
    // .addEntry('js/plugins/bootstrap-tagsinput', './assets/js/plugins/bootstrap-tagsinput.js')
    // .addEntry('js/plugins/jasny-bootstrap', './assets/js/plugins/jasny-bootstrap.min.js')
    // .addEntry('js/plugins/moment', './assets/js/plugins/moment.min.js')
    // .addEntry('js/emove', './assets/js/emove.js')
    // CSS
    .addStyleEntry('css/app', './assets/scss/app.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;


module.exports = Encore.getWebpackConfig();
