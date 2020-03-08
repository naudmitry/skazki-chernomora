let mix = require('laravel-mix');

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
mix.js('resources/assets/js/vali-admin.js', 'public/vali-admin/js/app.js')
    .sass('resources/assets/sass/vali-admin.scss', 'public/vali-admin/css/app.css');

mix.js('resources/assets/js/miracle.js', 'public/miracle/js');