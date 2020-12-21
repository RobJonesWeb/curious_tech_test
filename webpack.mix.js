const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/@fortawesome/fontawesome-free/js/all.min.js', 'public/js/fontawesome.js');
mix.copy('node_modules/@fortawesome/fontawesome-free/js/brands.min.js', 'public/js/brands.js');
mix.copy('node_modules/@fortawesome/fontawesome-free/js/solid.min.js', 'public/js/solid.js');

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
