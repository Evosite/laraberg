const mix = require('laravel-mix');

mix
    .sass('resources/scss/laraberg.scss', 'css/')
    .ts('resources/ts/laraberg.ts', 'js/laraberg.js')
    .setResourceRoot('/vendor/laraberg/')
    .setPublicPath('resources/dist/')
    .version()
    .sourceMaps()
    .react()