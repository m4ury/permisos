const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

/*mix.browserSync({
    proxy: 'http://localhost:8080/cometidos',
    browser: 'Firefox',
    open: 'false'
});*/
