


require('dotenv').config()
let mix = require('laravel-mix');



mix.webpackConfig({
    resolve: {
        alias: {
            '@module': __dirname + '/app/module',
            '@resource': __dirname + '/resources/assets/js/vue',
        },
    }
});
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/vue/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');









// mix.styles([
//
//
//     'public/assets/admin/bootstrap/dist/css/bootstrap.min.css',
//     'public/assets/admin/plugins/bower_components/tablesaw-master/dist/tablesaw.css',
//     'public/assets/admin/css/animate.css',
//     'public/assets/admin/css/style.css',
//     'public/assets/admin/css/colors/default.css',
//     'public/assets/admin/css/helper.css',
//     'public/assets/admin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css',
//     'public/assets/admin/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css',
//     'public/assets/admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css',
//     'public/assets/admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css',
//     'public/assets/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css',
// ], 'public/delete_test.css');

// mix.styles([
//     'public/css/vendor/normalize.css',
//     'public/css/vendor/videojs.css'
// ], 'public/css/all.css');