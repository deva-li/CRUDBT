require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App.vue';
import VueSweetalert2 from 'vue-sweetalert2'; 
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
// import '../../routes/web.php';
Vue.component('pagination', require('laravel-vue-pagination')); 

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

import GuestbookIndex from './components/GuestbookIndex.vue';
import GuestbookCreate from './components/GuestbookCreate.vue';
import GuestbookShow from './components/GuestbookShow.vue';
import GuestbookEdit from './components/GuestbookEdit.vue';
import landing from './components/jumbotron.vue';
import login from '../js/auth/login.vue';
import register from '../js/auth/register.vue';

const routes = [
  {
      name: 'home',
      path: '/bukutamu',
      component: GuestbookIndex
  },
  {
      name: 'create',
      path: '/guestbook/create',
      component: GuestbookCreate
  },
  {
      name: 'edit',
      path: '/guestbook/edit/:id',
      component: GuestbookEdit
  },
  {
    name: 'show',
    path: '/guestbook/show/:id',
    component: GuestbookShow
},
{
    name: 'landing',
    path: '/',
    component: landing
},
{
    name: 'login',
    path: '/login',
    component: login
},
{
    name: 'register',
    path: '/register',
    component: register
}
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');