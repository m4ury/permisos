require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'categoria-component',{},
    require('./components/CategoriaComponent').default
);
Vue.component(
    'acuerdo-component', () => require('./components/AcuerdoComponent').default
)

const app = new Vue({
    el: '#app'
});
