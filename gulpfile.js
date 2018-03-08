var elixir = require('laravel-elixir');
require('lodash');

elixir(function(mix){
    mix.browserify('app.js');
});
/*
elixir(function(mix) {
    // some mixes here..
    mix.webpack('app.js');
});*/
