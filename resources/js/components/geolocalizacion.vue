<template>
  <gmap-map
    :center="center"
    :zoom="5"
    style="width: 100%; height: 500px"
  >
    <!-- <gmap-marker
      :key="index"
      v-for="(m, index) in markers"
      :position="m.position"
      :title="m.title"
      :clickable="true"
      :draggable="true"
      @click="center=m.position"
    ></gmap-marker> -->

     <gmap-marker :clickable="true" :position="center" :draggable="true" @drag="updateCoordinates"/>
   
  </gmap-map>
</template>
<script>
  export default {
    data () {
      return {
        
        center: {lat: this.latitude, lng: this.longitude},
        markers: [{
          position: {lat: this.latitude, lng: this.longitude},
          title: this.title
        }],
        coordinates: {
          lat:'',
          lng:''
        }
        
      }
    },

    props: {
        latitude: Number,
        longitude: Number,
        title: String
    },

    methods: {
        async updateCoordinates(location) {
        this.coordinates = {
            lat: location.latLng.lat(),
            lng: location.latLng.lng(),
            };
            this.enviar();
        },

        async enviar(){
          this.$emit('traer', this.coordinates);
        }
    }

   
  }
</script>