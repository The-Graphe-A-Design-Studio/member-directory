const mix = require('laravel-mix');

<<<<<<< HEAD
=======
var VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin');
var CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');

var webpackConfig = {
    plugins: [
        new VuetifyLoaderPlugin(),
        new CaseSensitivePathsPlugin()
        // other plugins ...
    ]
    // other webpack config ...
}
mix.webpackConfig(webpackConfig);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
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

<<<<<<< HEAD
mix.js('resources/js/app.js', 'js');
// mix.styles([
//     'public/css/main.css',
//     'public/css/style2.css'
// ], 'public/css/all.css');
=======
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
