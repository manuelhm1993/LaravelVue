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

/*
 |--------------------------------------------------------------------------
 | Forma de compilar varios archivos JavaScript
 |--------------------------------------------------------------------------
 |
 | Se utiliza el objeto mix y el método scripts, el primer parámetro es un array
 | dicho array guardará las rutas relativas de los archivos scripts que se van
 | a compilar y deben estar ubicados en forma jerárquica. El segundo parámetro es
 | una cadena que tendrá la ruta relativa del archivo resultante
 |
 */

 /*mix.scripts([
    'resources/assets/js/vue.js',
    'resources/assets/js/axios.js',
    'resources/assets/js/app.js',
 ], 'public/js/app.js');*/