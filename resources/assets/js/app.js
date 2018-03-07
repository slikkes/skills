
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../../public/js/flip.js');

window.Vue = require('vue');

//import Vue from 'vue';
let Vue=require('vue');




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('Card', require('./components/cards/Card.vue'));
Vue.component('CardHolder', require('./components/cards/CardHolder.vue'));

Vue.component('todo', require('./components/todo/App.vue'));

const app = new Vue({
    el: '#cardApp'
});

/*
const todo= new Vue({
    el: '#app'
    });
*/



//Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;