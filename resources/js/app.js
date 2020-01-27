/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import vuetify from './vuetify/'
import router from './Router/'
import User from './Helper/User'
import Vuex from 'vuex'
import appStore from './appStore'
import VueSimplemde from 'vue-simplemde'

const token = localStorage.getItem('user-token')
if (token) {
  axios.defaults.headers.common['Authorization'] = token
}

const store = new Vuex.Store(appStore);

router.beforeEach((to, from, next) => {
    const isAuthenticated = store.state.isLoggedIn;

    if (!isAuthenticated && to.path !== "/login" && to.path !== "/forum" && to.path !== "/signup"){
        return  next('/login');
    }else if(to.path == '/login' && isAuthenticated){
        return  next('/forum');
    }else{
        next();
    }

  })

window.User = User;

window.EventBus = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('AppHome', require('./components/AppHome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-simplemde', VueSimplemde)

const app = new Vue({
    vuetify,
    router,
    store,
    el: '#app',
});

