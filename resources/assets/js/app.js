
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


let _ = require('lodash');
let axios= require('axios');
let Vue=require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));


/*
Vue.component('todo', require('./components/todo/App.vue'));
const todo= new Vue({
    el: '#app'
    });
*/


Vue.component('List',require('./components/todo/List.vue').default);
Vue.component('CardHolder', require('./components/cards/CardHolder.vue').default);
Vue.component('TodoContainer', require('./components/todo/TodoContainer.vue').default);

const app = new Vue({
    el: '#cardApp'
});


/*Vue.component('List', require('./components/List.vue').default)
import Editor from './components/Editor';

var app = new Vue({
    el:'#edit',
});*/






