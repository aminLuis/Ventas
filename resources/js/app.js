
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('venta-component', require('./components/formVenta.vue').default);
Vue.component('cliente-component', require('./components/formCliente.vue').default);
Vue.component('posicionamiento-component', require('./components/geolocalizacion.vue').default);

//Componente para la paginación (laravel-vue-pagination)
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
});
