const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(function (mix){
    mix.sass('app.scss')


        .styles([
        'blog-home.css',
        'bootstrap.css',
            'sb-admin-2.css',
            'metisMenu.css',
            'styles.css',
            'timeline.css',
            'font-awesome.css',
            'blog-post.css',
        'bootstrap.min.css'


        ],'./public/css/libs.css')
            .scripts([
                   "app.js",
                    "bootstrap.js",
                     "sb-admin-2.js",
                     "bootstrap.min.js",
                       "jquery.js",
             ],'./public/js/libs.js')






});
