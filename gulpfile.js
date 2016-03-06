var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
     mix.copy('vendor/enyo/dropzone/dist', 'public/assets/dropzone');

     mix.copy('vendor/robinherbots/jquery.inputmask/dist/min', 'public/assets/inputmask');

     // for select2 plugin
     mix.copy('vendor/ivaynberg/select2/dist/', 'public/assets/select2');

     mix.browserify('main.js');

});
