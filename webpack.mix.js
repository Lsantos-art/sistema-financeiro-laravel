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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
// mix.js([
//     'resources/views/site/assets/js/scripts.js'
// ], 'public/site/js/scripts.js')
mix.styles([
        'resources/views/site/assets/css/styles.css'
    ], 'public/site/css/styles.css').version()
