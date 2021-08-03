<template>
  
  <div id="app">
    <div class="row">   
       <GoogleMap :latitude= 13.7013266 :longitude= -89.226622 :title="'Titulo Marcador'" />
    </div>
  </div>

</template>

<script>
import GoogleMap from "./geolocalizacion";

export default {
  name: 'App',
  components: {
    GoogleMap
  }
}
</script>