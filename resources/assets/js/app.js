import "./bootstrap.js";

import Vue from "vue";

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
