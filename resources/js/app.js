
require('./bootstrap');
import * as VueGoogleMaps from "vue2-google-maps";
window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('venta-component', require('./components/formVenta.vue').default);
Vue.component('cliente-component', require('./components/formCliente.vue').default);
Vue.component('posicionamiento-component', require('./components/geolocalizacion.vue').default);
Vue.component('maps-component', require('./components/mapa.vue').default);

//Componente para la paginación (laravel-vue-pagination)
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueGoogleMaps, {
    load: {
      key: "AIzaSyDW_p10NjPm2ru42ZNu_Oj-UgdV1BVcZuc",
    },
  });

const app = new Vue({
    el: '#app',
});
