/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Form = require('./util/Form').default;
import Toasted from 'vue-toasted';

var toastedOptions = {
    theme: "outline",
    position: "bottom-left",
    duration : 5000
};
Vue.use(Toasted, toastedOptions);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('collapse-item', require('./components/collapseItem.vue').default);
Vue.component('collapse-group', require('./components/collapseGroup.vue').default);
Vue.component('vote-item-chioce', require('./components/voteItemChoice.vue').default);
Vue.component('vote-item', require('./components/voteItem.vue').default);
Vue.component('login', require('./components/login.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function () {
        return {
            voteData: []
        }
    },
});
