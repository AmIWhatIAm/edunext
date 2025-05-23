const mix = require('laravel-mix');
mix.browserSync('127.0.0.1:8000');

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
       require('tailwindcss'), // ✅ This is what activates Tailwind
       require('autoprefixer'), // (Optional but recommended)
   ])
   .options({
       processCssUrls: false,
   });
