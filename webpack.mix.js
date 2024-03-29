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
 .version()
 .webpackConfig(require('./webpack.config'));

mix.js('resources/js/Gene.js', 'public/js/genes');

mix.js('resources/js/register.js', 'public/js/paper/register.js');

mix.sass('resources/sass/app.scss', 'public/css').version();


if (mix.inProduction()) {
 mix.version();
}
mix.webpackConfig({
 watchOptions: {
     ignored: /node_modules/
 }    
});
