/*jshint esversion:8 */
import router from "./router";
import VModal from 'vue-js-modal';
import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css'; //Vuesax styles
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import  "assets/css/bootstrap.min.css";

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VModal);
Vue.use(Vuesax);


window.axios.defaults.headers.get['Accept'] = 'application/json'; // default header for all get request
window.axios.defaults.headers.post['Accept'] = 'application/json';


const token = localStorage.getItem('access_token');
if(token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

// window.axios.interceptors.response.use(function(response){
//     return response;
// }, function (error) {
//     if (401 === error.response.status) {
//         store.dispatch('account/userLogout')
//         .then(() => {
//             router.push('/login');
//         });
//     }else{
//         return Promise.reject(error);
//     }
// });


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
});
