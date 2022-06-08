<template>
  <div>    
    <div id="map" ref="mapRef"></div>
  </div>
</template>

<script>
export default {
  name: "Map",
  props: {
    lon: Number, 
    lat: Number,
  },
  methods: {
    initializeMap: function () {
      const map = tt.map({
        key: "yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj",
        container: "map",
        zoom: 15,
        center: [this.lon, this.lat],
      });
      // aggiunta controlli mappa
      map.addControl(new tt.FullscreenControl());
      map.addControl(new tt.NavigationControl());
      new tt.Marker().setLngLat([this.lon, this.lat]).addTo(map);
    },
  },
  mounted: function () {
    this.initializeMap();
  },
};
</script>
<style>
#map {
  border-radius: 10px;
  height: 250px;
  width: 100%;
}
</style>