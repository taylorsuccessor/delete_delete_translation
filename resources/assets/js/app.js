
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


import vue_routes  from '@module/vue/vue/route';
import project_routes  from '@module/project/vue/route';
let router=  new VueRouter({ routes:vue_routes.concat(project_routes)});



import Notifications from 'vue-notification'


Vue.use(Notifications)


Vue.component('pagination', require('./helper/pagination'));

Vue.filter('translate', function (value) {

    return translate(value);
});



Vue.filter('can', function (value) {

    return can(value);
});


var app = null;
import ServerDataInit from '@resource/setting/ServerDataInit'
function initApp(serverInitData){

   new ServerDataInit(serverInitData);

     app = new Vue({
        el: '#mainAppContainer',
        router:router,
    });

}


import ApiBase from '@resource/api/ApiBase'


new ApiBase().get('/admin/get_setting/',{},initApp) ;
