require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);


import {routes} from './routers';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master',require('./components/backend/AdminMaster.vue').default);


const router = new VueRouter({
    routes,
    mode:'history'
});


const app = new Vue({
    el: '#app',
    router
});