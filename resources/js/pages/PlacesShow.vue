<template>
  <div class="container">
    <div class="container mb-5">
      <div class="row mb-3">
        <h1>{{ place.title }}</h1>
      </div>

      <div class="row mb-4">
        <figure class="w-100">
          <img
            v-if="place.img == null"
            class="place-img w-100"
            src="https://a0.muscache.com/im/pictures/04355deb-8003-47c5-8ef8-1ebca56d7720.jpg?im_w=1440"
            alt=""
          />
          <img
            v-else
            :src="`/storage/${place.img}`"
            class="place-img w-100"
            alt=""
          />
        </figure>
      </div>
      <div
        class="
          container
          flex-row flex-sm-column flex-md-column flex-xl-row flex-lg-row
          d-flex
        "
      >
        <div class="col-xs-12 col-md-12 col-lg-4">
          <div class="info d-flex justify-content-center align-items-center flex-column mb-4">
            <div>
              <h4>Hosted by {{ host }}</h4>
              <ul class="d-flex rooms">
                <li class="bedrooms mr-3">{{ place.rooms }} Rooms</li>
                <li class="beds mr-3">{{ place.beds }} Beds</li>
                <li class="bathrooms mr-3">{{ place.bathrooms }} Bathrooms</li>
              </ul>
              <div class="mb-3 dropdown-divider"></div>
              <div class="amenities">
                <h4>What this place offers</h4>
                <ul class="m-0 mb-3">
                  <li
                    class="mr-3"
                    v-for="amenity in amenities"
                    :key="amenity.id"
                  >
                    <i :class="amenity.icon" class="mr-2"></i>
                    {{ amenity.name }}
                  </li>
                </ul>
                <MessageHost :place_id="place_id" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-8">
          <Map :lat="place.lat" :lon="place.lon" />
        </div>
      </div>
    </div>
    <div class="container tomtom_map w-100 p-0"></div>
  </div>
</template>

<script>
import axios from "axios";
import MessageHost from "../pages/MessageHost.vue";
import Map from "../components/Map.vue";
export default {
  name: "PlacesShow",
  components: {
    MessageHost,
    Map,
  },
  props: {
    place: Object,
  },
  data() {
    return {
      amenities: [],
      host: "",
      place_id: "",
    };
  },

  methods: {
    fetchPlace() {
      axios.get(`/api/places/${this.$route.params.slug}`).then((res) => {
        const { place } = res.data;
        this.place = place;
        this.place_id = res.data.place.id;
        this.amenities = res.data.place.amenities;
        this.host = res.data.place.user.name;
      });
    },
    //TODO metter il catch error
  },

  beforeMount() {
    this.fetchPlace();
    console.log(this.place);
  },
};
</script>

<style lang="scss" scoped>
li {
  list-style: none;
}

.place-img {
  border-radius: 15px;
  width: 100%;
}
</style>