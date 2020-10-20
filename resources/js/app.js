

require('./bootstrap');

import Vuex from 'vuex'
import storeData from './store/index'
import {filter}  from  './filter'

Vue.use(Vuex)
const store = new Vuex.Store(
    storeData
)
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import  {routes} from "./routes";

 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('admin-home', require('./components/admin/AdminMaster.vue').default);

 import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form=Form;
/*      sweetalert           */
import Swal from 'sweetalert2'
window.Swal=Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})
window.Toast=Toast;


const router = new VueRouter({
    routes ,// short for `routes: routes`
    mode: 'history',
})

const app = new Vue({
    el: '#app',
    router,
    store
});
