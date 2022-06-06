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
            const {places} = res.data;
            this.places = places;
        })
        .catch( error => {
            console.warn(error);
        })
    },
  },

  beforeMount() {
    this.fetchPlaces();
  },
};
</script>

<style lang="scss" scoped>

.myLink{
  cursor: pointer;
}

</style>