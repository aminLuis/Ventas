<template>
  
  <div id="app">
    <div class="row">   
       <geolocalizacion :latitude= 4.6486259 :longitude= -74.2478956 :title="'Titulo Marcador'" />  
   </div>
   </div>

</template>

<script>
import geolocalizacion from "./geolocalizacion";

export default {

  data() {
      return {
          lati: '',
          log:''
      };
  }, 

  methods:{
    
  },

  name: 'App',
  components: {
  geolocalizacion
  }
}
</script>
