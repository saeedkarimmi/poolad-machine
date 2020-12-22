const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));



// Panel Styles
mix.styles(
    [
        'vendor/saeedkarimmi/cms/src/assets/css/bootstrap.min.css',
        'vendor/saeedkarimmi/cms/src/assets/css/font-awesome.min.css',
        'vendor/saeedkarimmi/cms/src/assets/css/plugins/iCheck/custom.css',
        'vendor/saeedkarimmi/cms/src/assets/css/plugins/toastr/toastr.min.css',
        'vendor/saeedkarimmi/cms/src/assets/css/plugins/dataTables/datatables.min.css',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/gritter/jquery.gritter.css',
        'vendor/saeedkarimmi/cms/src/assets/css/animate.css',
        'vendor/saeedkarimmi/cms/src/assets/css/plugins/select2/select2.min.css',
        'vendor/saeedkarimmi/cms/src/assets/css/plugins/select2/select2-bootstrap4.min.css',
        'vendor/saeedkarimmi/cms/src/assets/css/style.css',

    ]
    , 'public/bundle/panel.css');

// Panel Scripts
mix.scripts(
    [
        'vendor/saeedkarimmi/cms/src/assets/js/jquery-3.1.1.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/popper.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/bootstrap.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/metisMenu/jquery.metisMenu.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.tooltip.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.spline.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.resize.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.pie.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.symbol.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.time.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/peity/jquery.peity.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/demo/peity-demo.js',
        'vendor/saeedkarimmi/cms/src/assets/js/inspinia.js',
        'vendor/saeedkarimmi/cms/src/assets/js/icheck.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/jquery.form.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/pace/pace.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/jquery-ui/jquery-ui.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/gritter/jquery.gritter.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/dataTables/datatables.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/dataTables/dataTables.bootstrap4.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/sparkline/jquery.sparkline.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/demo/sparkline-demo.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/chartJs/Chart.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/select2/select2.full.min.js',
        'vendor/saeedkarimmi/cms/src/assets/js/plugins/toastr/toastr.min.js',
    ]
    , 'public/bundle/panel.js');