<template>
    <div>
      <!-- router link che manda alla show di ogni singolo place -->
        <ul>
          <router-link :to="{ name:'places.show', params:{slug:place.slug} }" 
              tag="li" v-for="place in places" :key="place.id" 
              class="myLink px-3 py-1 rounded-full text-sm whitespace-nowrap bg-white">
              {{ place.title }}
          </router-link>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
  components: {},

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

  mounted() {
    this.fetchPlaces();
  },
};
</script>

<style lang="scss" scoped>

.myLink{
  cursor: pointer;
}

</style>