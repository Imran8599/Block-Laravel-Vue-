require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);


import {routes} from './routers';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('master',require('./components/backend/AdminMaster.vue'));
// Vue.component('dashboard',require('./components/backend/AdminDashboard.vue'));


const router = new VueRouter({
    routes
});


const app = new Vue({
    el: '#app',
    router
});