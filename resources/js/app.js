require('./bootstrap');

//Vue
window.Vue = require('vue');

//Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store'
const store = new Vuex.Store(
    storeData
);

//Vue Routers
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import {routes} from './routers';

//Components
Vue.component('admin-master',require('./components/backend/AdminMaster.vue').default);
Vue.component('index-master',require('./components/frontend/IndexMaster.vue').default);

//VForm
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Sweetalert2
import Swal from 'sweetalert2'
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;

// Vue Filter
import {filter} from './filter'

// Text Editor
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor)


const router = new VueRouter({
    routes,
    mode:'hash'
});


const app = new Vue({
    el: '#app',
    router,
    store
});