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
mix.js('resources/assets/js/app.js', 'public/vali-admin/js');

mix.styles([
        'resources/assets/css/main_theme.css',
    ],
    'public/main_theme/css/style.css');

mix.scripts([
        'resources/assets/js/main_theme/scripts.js',
        'resources/assets/js/main_theme/datepicker-ru.js',
    ],
    'public/main_theme/js/scripts.js');
