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
        'resources/css/animate.css',
        'resources/css/bootstrap.min.css',
        'resources/css/chart.min.css',
        'resources/css/fontawesome.css',
        'resources/css/select2.min.css',
        'resources/css/bootstrap-datepicker.min.css',
        'resources/css/persianDatepicker-default.css',
        'resources/css/datatable.min.css',

    ]
    , 'public/bundle/panel.css');


// Panel Scripts
mix.scripts(
    [
        'resources/js/jquery.min.js',
        'resources/js/popper.js',
        'resources/js/jquery.form.min.js',
        'resources/js/bootstrap.min.js',
        'resources/js/chart.min.js',
        'resources/js/progressbar.min.js',
        'resources/js/datatables.min.js',
        'resources/js/select2.full.min.js',
        'resources/js/sweetalert.min.js',
    ]
    , 'public/bundle/panel.js');
