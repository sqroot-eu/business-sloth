/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import routes from './routes'
import BootstrapVue from 'bootstrap-vue'

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(BootstrapVue);

Vue.component('tweet-score', require('./components/TweetScore'));

const router = new VueRouter({
    mode: 'hash',
    routes: routes,
});



const app = new Vue({
    el: '#app',
    render: createElement => createElement(require('./App.vue')),
    router
});
