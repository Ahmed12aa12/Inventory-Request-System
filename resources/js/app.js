
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import'@fortawesome/fontawesome-free/css/all.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

window.Vue = require('vue');

// ES6 Modules or TypeScript
import swal from 'sweetalert2'

// CommonJS
window.swal =swal;

const toast = swal.mixin({
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
window.toast = toast;
import VueProgressBar from 'vue-progressbar'
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
}

Vue.use(VueProgressBar, options);

import { Form, HasError, AlertError } from 'vform'
window.Form=Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'

Vue.use(Vuetify)
Vue.use(VueRouter)

import 'vuetify/dist/vuetify.min.css'


import Auth from './auth'

Vue.prototype.$auth = new Auth(window.user);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
window.Fire=new Vue(); 
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin', require('./components/Admin.vue').default);

import Dashboard from './pages/Dashboard'
import Users from './pages/Users'
import Roles from './pages/Roles'
import Permissions from './pages/Permissions'
import Activities from './pages/Activities'
import Category from './pages/Category'
import Item from './pages/Item'
import Faculty from './pages/Faculty'
import Department from './pages/Department'
import Orders from './pages/Order'
import colors from 'vuetify/lib/util/colors';
const routes = [
  {
      path: '/admin/',
      component: Dashboard
  },
  {
      path: '/admin/users',
      component: Users
  },
  {
      path: '/admin/roles',
      component: Roles
  },
  {
      path: '/admin/permissions',
      component: Permissions
  },

  {
    path: '/admin/activities',
    component: Activities
},
 {
    path: '/admin/category',
    component: Category
},
{
    path: '/admin/item',
    component: Item
},
{
    path: '/admin/faculty',
    component: Faculty
},
    {
        path: '/admin/department',
        component: Department
    }, {
        path: '/admin/orders',
        component: Orders
    }, 

];

const router = new VueRouter({
  mode: 'history',
  routes
})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    icons:{
        iconfont:'md'||'fa'
    },
    thomo:{
        themes:{
           light:{background: colors.blue.accent2,} ,
           dark:{
               background: colors.blue,
           }


    },

}
});
