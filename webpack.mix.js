const mix = require('laravel-mix');

mix.js(['resources/js/app.js', 'resources/js/all.min.js', 'resources/js/chosen.jquery.min.js', 'resources/js/trumbowyg.min.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.options({
    imgLoaderOptions: {
        enabled: false
    },
});