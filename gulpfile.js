var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');
require('laravel-elixir-stylus');


elixir(function(mix) {
    // Compile CSS
    mix

		/*.stylus('app.styl')*/
		
        .styles(
            [
                'slick/slick.css',
                'slick/slick-theme.css',
            ], // Source files
            'public/css/styles.css' // Destination file
        )

        // Compile JavaScript
        /*.scripts(
            [
                //'vue/vue.min.js',
                //'vue-resource/vue-resource.min.js',
                //'underscore/underscore-min.js',
                //'magnific-popup/jquery.magnific-popup.min.js',
                'slick/slick.min.js'
            ],
            'resources/assets/js/imports.js' // Destination file
        )*/


        .stylus('app.styl')

        .browserify('main.js')
        
        .browserSync({
            proxy: 'normx.dev',
            notify: false
        });
});
