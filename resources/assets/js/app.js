
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

import VueRouter from 'vue-router';
Vue.use(VueRouter);


import vue_routes  from '../../../app/module/vue/admin/view/vue/route.js';
let router=  new VueRouter({ routes:vue_routes.concat([])});









Vue.component('pagination', require('./helper/pagination'));





const app = new Vue({
    //el: '#wrprojecter',
    el: '#class1',
    data:{
        message:'my message',

    },
    router:router,
    //router:router2

});

const app2 = new Vue({
    //el: '#wrprojecter',
    el: '#class2',
    data:{
        message:'my message',

    },
    //router:router2
    router:router,

});
