require('./bootstrap');

window.Vue = require('vue');

Vue.component('user-component', require('./components/UserComponent.vue'), {name: 'user-component'}).default;
Vue.component('categoria', require('./components/Categoria.vue'), {name: 'categoria'}).default;

const app = new Vue({
    el: '#app',
});
