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

mix.js('resources/assets/js/app.js', 'public/js/admin')
    .sass('resources/assets/sass/app.scss', 'public/css/admin');

mix.scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/js/main.js'
    ],
    'public/js/admin/scripts.js'
);

mix.styles([
        'resources/assets/css/main.css',
        'node_modules/dragula/dist/dragula.min.css',
    ],
    'public/css/admin/style.css');

mix.styles([
        'resources/assets/css/style.css',
    ],
    'public/css/site/style.css');

mix.styles([
        'node_modules/@fortawesome/fontawesome-free/css/fontawesome.css',
        'node_modules/@fortawesome/fontawesome-free/css/solid.css',
        'node_modules/@fortawesome/fontawesome-free/css/regular.css',
        'node_modules/@fortawesome/fontawesome-free/css/brands.css',
    ],
    'public/css/fontawesome.css');
