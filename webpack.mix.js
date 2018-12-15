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

mix.js('resources/assets/js/app.js', 'public/main_admin/js');

mix.scripts([
        'node_modules/jquery/dist/jquery.min.js',
        // 'node_modules/popper.js/dist/popper.min.js',
        // 'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/js/main.js',
        'node_modules/bootstrap-notify/bootstrap-notify.min.js'
    ],
    'public/main_admin/js/scripts.js'
);

mix.styles([
        'resources/assets/css/main_admin.css',
        'node_modules/dragula/dist/dragula.min.css',
    ],
    'public/main_admin/css/style.css');

mix.styles([
        'resources/assets/css/main_theme.css',
    ],
    'public/main_theme/css/style.css');

mix.styles([
        'node_modules/@fortawesome/fontawesome-free/css/fontawesome.css',
        'node_modules/@fortawesome/fontawesome-free/css/solid.css',
        'node_modules/@fortawesome/fontawesome-free/css/regular.css',
        'node_modules/@fortawesome/fontawesome-free/css/brands.css',
    ],
    'public/css/fontawesome.css');

mix.scripts([
        'resources/assets/js/main_theme/scripts.js',
        'resources/assets/js/main_theme/datepicker-ru.js',
    ],
    'public/main_theme/js/scripts.js'
);
