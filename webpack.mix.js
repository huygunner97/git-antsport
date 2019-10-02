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
   .js('resources/js/chat.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/detail.scss', 'public/css')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/admin/auth.scss', 'public/css/admin')
    .sass('resources/sass/admin/layout.scss', 'public/css/admin')
    .sass('resources/sass/messenger.scss', 'public/css')
    .options({
      processCssUrls: false
   });

mix.disableNotifications();

