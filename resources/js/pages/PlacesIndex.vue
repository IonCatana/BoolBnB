<template>
    <div class="card-wrapper d-flex flex-wrap justify-content-center">
        <PlacesCard tag="div" v-for="place in places" :key="place.id" :place="place"/>
    </div>
</template>

<script>
import axios from "axios";
import PlacesCard from '../components/PlacesCard.vue'

export default {
  components: {
    PlacesCard,
  },

  data() {
    return {
      places: [],
    };
  },

  methods: {
    fetchPlaces() {
        axios.get("/api/places")
        .then((res) => {
            this.places = res.data.places;
            console.log(this.amenities);
        })
        .catch( error => {
            console.warn(error);
        })
    },
  },

  mounted() {
    this.fetchPlaces();
  },
};
</script>

<style lang="scss" scoped>
// .card-wrapper {
//   gap: 2%;
// }
</style>