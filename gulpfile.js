var elixir = require('laravel-elixir');
require('lodash');
require('axios');

elixir(function(mix){
    mix.browserify('app.js');
});
/*
elixir(function(mix) {
    // some mixes here..
    mix.webpack('app.js');
});*/
