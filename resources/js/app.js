/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import router from './router/router';
import store from './store/index';

// フォントアイコン
import fontawesome from '@fortawesome/fontawesome';
import regular from '@fortawesome/fontawesome-free-solid';
import solid from '@fortawesome/fontawesome-free-regular';
import brands from '@fortawesome/fontawesome-free-brands';

fontawesome.library.add(regular);
fontawesome.library.add(solid);
fontawesome.library.add(brands);

Vue.config.productionTip = false;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const createApp = async function(){
    await store.dispatch('auth/currentUser');

    new Vue({
        router, // ルーティングの定義を読み込む
        store, // ストアの定義を読み込む
        render: h => h(App),
    }).$mount('#app');
}

createApp();


