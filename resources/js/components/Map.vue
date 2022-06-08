<template>
  <div>    
    <div id="map" ref="mapRef"></div>
  </div>
</template>

<script>
export default {
  name: "Map",
  methods: {
    initializeMap: function () {
      const map = tt.map({
        key: "yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj",
        container: "map",
        zoom: 15,
        center: [9.1859243, 45.4654219],
      });
      // aggiunta controlli mappa
      map.addControl(new tt.FullscreenControl());
      map.addControl(new tt.NavigationControl());
      new tt.Marker().setLngLat([9.1859243, 45.4654219]).addTo(map);
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
  height: 25vh;
  width: 100%;
}
</style>