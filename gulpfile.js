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
    // mix.phpUnit();
     mix.styles([
      'backoffice.css',
      'bootstrap.min.css',
      'bootstrap-social.css',
      'font-awesome.min.css',
      'fonts.googleapis.css.css',
      'jBox.css',
      'ladda.min.css',
      'ladda-themeless.min.css',
      'sweetalert.css',
      'datatables.min.css',
      'styles.css',
      'select2.min.css',
      'basic.css',
      'dropzone.css'
      ],
      'public/css/app_backoffice.css');

      mix.styles([
       'bootstrap.min.css',
       'bootstrap-social.css',
       'font-awesome.min.css',
       'fonts.googleapis.css.css',
       'jBox.css',
       'shop-homepage.css',
       'sweetalert.css',
       'datatables.min.css'
       ],
       'public/css/main_app.css');
});
