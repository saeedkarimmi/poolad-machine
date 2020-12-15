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
        'packages/saeedkarimmi/cms/src/assets/css/bootstrap.min.css',
        'packages/saeedkarimmi/cms/src/assets/css/font-awesome.min.css',
        'packages/saeedkarimmi/cms/src/assets/css/plugins/toastr/toastr.min.css',
        'packages/saeedkarimmi/cms/src/assets/css/plugins/dataTables/datatables.min.css',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/gritter/jquery.gritter.css',
        'packages/saeedkarimmi/cms/src/assets/css/animate.css',
        'packages/saeedkarimmi/cms/src/assets/css/style.css',

    ]
    , 'public/bundle/panel.css');

// Panel Scripts
mix.scripts(
    [
        'packages/saeedkarimmi/cms/src/assets/js/jquery-3.1.1.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/popper.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/bootstrap.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/metisMenu/jquery.metisMenu.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.tooltip.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.spline.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.resize.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.pie.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.symbol.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/flot/jquery.flot.time.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/peity/jquery.peity.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/demo/peity-demo.js',
        'packages/saeedkarimmi/cms/src/assets/js/inspinia.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/pace/pace.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/jquery-ui/jquery-ui.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/gritter/jquery.gritter.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/dataTables/datatables.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/dataTables/dataTables.bootstrap4.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/sparkline/jquery.sparkline.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/demo/sparkline-demo.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/chartJs/Chart.min.js',
        'packages/saeedkarimmi/cms/src/assets/js/plugins/toastr/toastr.min.js',
    ]
    , 'public/bundle/panel.js');