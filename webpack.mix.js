const mix = require('laravel-mix');

mix.setPublicPath('/');
mix.setResourceRoot('../');

mix.js(['resources/js/app.js', 'resources/js/all.min.js', 'resources/js/chosen.jquery.min.js', 'resources/js/trumbowyg.min.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .autoload({
        jquery: ['$', 'window.$', 'window.jQuery']
    });
mix.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/svg');

mix.copy('node_modules/chosen-js/chosen-sprite.png', 'public/css/images/vendor/chosen-js');
