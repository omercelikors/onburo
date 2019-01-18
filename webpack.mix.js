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
   .sass('resources/sass/app.scss', 'public/css')

   // tablefilter extension
   .js('resources/js/extensions/tablesort.js', 'public/js/extensions')
   .copy('resources/css/extensions/tablefilter.css', 'public/css/extensions')
   .copy('resources/img/extensions/btn_clear_filters.png', 'public/img/extensions')
   .copy('resources/img/extensions/btn_first_page.gif', 'public/img/extensions')
   .copy('resources/img/extensions/btn_last_page.gif', 'public/img/extensions')
   .copy('resources/img/extensions/btn_next_page.gif', 'public/img/extensions')
   .copy('resources/img/extensions/btn_previous_page.gif', 'public/img/extensions')
   .copy('resources/img/extensions/upsimple.png', 'public/img/extensions')
   .copy('resources/img/extensions/downsimple.png', 'public/img/extensions')

   // country dropdown extension
   .js('resources/js/extensions/bootstrap-formhelpers.min.js', 'public/js/extensions')
   .copy('resources/css/extensions/bootstrap-formhelpers.min.css', 'public/css/extensions');
