const mix = require('laravel-mix');
mix.ts('resources/js/app.ts', 'public/js') //mix.jsをmix.tsに、app.jsをapp.tsに変更
    .postCss('resources/css/app.css', 'public/css', [
            //
    ]).vue(); 
