require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);


import {routes} from './routers';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master',require('./components/backend/AdminMaster.vue').default);

//VForm
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

const router = new VueRouter({
    routes,
    mode:'history'
});


const app = new Vue({
    el: '#app',
    router
});