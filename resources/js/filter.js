import moment from 'moment'
import Vue from 'vue'

// Moment Js 
Vue.filter('dateformat',(arg)=>{
    return moment(arg).format("MMM Do YYYY");
})