require('./bootstrap');

window.Vue = require('vue');

Vue.component('categoria', require('./components/categoria/Categoria'));
Vue.component('form-categoria', require('./components/categoria/FormCategoria'));


const app = new Vue({
    el: '#app',
});
