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

      mix.scripts([
          'oficial_scripts/jquery.min.js',
          'oficial_scripts/bootstrap.min.js',
          'oficial_scripts/jquery.inputmask.bundle.min.js',
          'oficial_scripts/datatables.min.js',
          'oficial_scripts/dropzone.js',
          'oficial_scripts/jquery.touchSwipe.min.js',
          'oficial_scripts/ladda.min.js',
          'oficial_scripts/parsley.min.js',
          'oficial_scripts/select2.min.js',
          'oficial_scripts/spin.min.js',
          'oficial_scripts/sweetalert.min.js',
          'oficial_scripts/custom_script.js',
          'oficial_scripts/JQ.js'
      ],
      'public/js/backoffice.js'
      );

      mix.scripts([
          'oficial_scripts/jquery.min.js',
          'oficial_scripts/bootstrap.min.js',
          'oficial_scripts/html5shiv.js',
          'oficial_scripts/respond.min.js',
          'oficial_scripts/datatables.min.js',
          'oficial_scripts/jquery.touchSwipe.min.js',
          'oficial_scripts/header_fading.js'
      ],
      'public/js/main_app.js'
      );

      mix.copy([
              'resources/assets/js/oficial_scripts/login_script.js',
              'resources/assets/js/oficial_scripts/jBox.min.js'
                ], 'public/js');
});
