<template>
  <div id="advanced_search" class="justify-content-center">
    <div
      class="amenity_card px-4 d-flex justify-content-center align-items-center"
    >
      <div class="overflow-hidden amenity_icon">
        <div
          v-for="(amenity, i) in amenities"
          :key="amenity.id"
          class="icon"
          :class="{ clickedAmenity: i === activeItem }"
        >
          <button class="amenity-button" @click="selectItem(i)">
            <i :class="amenity.icon"></i>
            <span class="d-block">{{ amenity.name }}</span>
          </button>
        </div>
      </div>

      <div class="">
        <!-- Button trigger modal -->
        <div class="filter">
          <button
            type="button"
            class="btn-filter btn btn-primary ml-4"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            <i class="fas fa-sort"></i>
            Filter
          </button>
        </div>

        <!-- Modal -->
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <!-- range -->
                <h2>Slide range km</h2>
                <RangeFilter class="mb-2" @pick-filter="addFilter" />

                <div class="dropdown-divider mb-4"></div>

                <!-- rooms, beds & bathrooms -->
                <div class="rooms_beds pb-2">
                  <!-- <h2 class="mb-3">Rooms, Beds & Bathrooms</h2> -->

                  <ButtonFilter class="mb-4" name="Rooms" @pick-filter="addFilter" />
                  <ButtonFilter class="mb-4" name="Beds" @pick-filter="addFilter" />
                  <ButtonFilter class="mb-4" name="Bathrooms" @pick-filter="addFilter" />
                </div>

                <div class="dropdown-divider mb-4"></div>

                <!-- amenities -->
                <div class="amenities">
                  <h2>Amenities</h2>
                  <AmenitiesFilter
                    @pick-filter="addAmenityFilter"
                    :amenities="amenities"
                  />
                </div>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>

                <button
                  type="button"
                  class="save-changes btn btn-primary"
                  data-dismiss="modal"
                  @click="updateUrl"
                >
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="loading">
      <!-- TODO loader -->
      Loading...
    </div>
    <div v-else class="card-wrapper d-flex flex-wrap justify-content-center">
      <places-card tag="div" v-for="place in places" :key="place.id" :place="place"/>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import RangeFilter from "../components/filters/RangeFilter.vue";
import ButtonFilter from "../components/filters/ButtonsFilter.vue";
import AmenitiesFilter from "../components/filters/AmenitiesFilter.vue";
import PlacesCard from "../components/PlacesCard.vue";

export default {
  components: {
    RangeFilter,
    ButtonFilter,
    AmenitiesFilter,
    PlacesCard,
  },

  props: {
    lat: Number,
    lon: Number,
  },

  data() {
    return {
      amenities: [],
      // value: "0",
      activeItem: null,

      params: null,

      // i filtri, per popolare la query
      activeFilters: new Map(),

      // la risposta del server alla chiamata api/search_area
      // TODO se places è vuoto: recupera query da $route e rifai chiamata -> watch: places????
      places: null,
      loading: false,
    };
  },

  created() {
    this.fetchAmenities();
    this.fetchPlaces();
  },

  watch: {
    $route() {
      console.log(this.params)
      this.fetchPlaces();
    }
  },

  methods: {
    fetchAmenities() {
      axios.get("/api/amenities").then((res) => {
        this.amenities = res.data.amenities;
      });
    },

    selectItem: function (i) {
      this.activeItem = i;
    },

    fetchPlaces() {
      this.prepareParams();
      console.log('params', this.params)

      this.places = null;
      this.loading = true;

      axios
        .get("/api/search_area", { params: this.params })
        .then((res) => {
          this.places = res.data.places;
          console.log('places', this.places);
          this.loading = false;
        })
        .catch((err) => {
          console.warn(err);
        });
    },

    prepareParams() {   
      this.params = null;
      
      let lat = this.lat;
      let lon = this.lon;

      // check url query if not found
      if (!this.lat) {
        lat = this.$route.query.lat;
        lon = this.$route.query.lon;
        console.log(lat, lon)
      }

      let filters = {};
      if (this.activeFilters.size !== 0) filters = Object.fromEntries(this.activeFilters);

      // check url query if not found
      if (Object.keys(filters).length === 0) {
        const array = Object.entries(this.$route.query);

        const amenititesAsArray = array.filter(([key, value]) => {
          return key === 'amenities'
        });
        console.log('am as arr', amenititesAsArray)

        let filtersAsArray = array.filter(([key, value]) => {
          console.table('keys', key, value)
          return key !== 'lat' && key !== 'lon' && key !== 'amenities';
        });

        filters = Object.fromEntries(filtersAsArray);
        console.log('filters', filters)

      }
      this.params = { lat, lon, ...filters };
      console.log('post', this.params)
    },

    updateUrl() {
      let filters;
      if (this.activeFilters.size !== 0) filters = Object.fromEntries(this.activeFilters);

      this.$router.replace({ params: { lat: this.lat, lon: this.lon }, query: { lat: this.lat, lon: this.lon, ...filters } });
    },

    addFilter(filter) {
      if (filter.value == null) {
        this.activeFilters.delete(filter.name);
        return;
      }

      this.activeFilters.set(filter.name, filter.value);
    },

    addAmenityFilter(array) {
      if (array.length === 0) this.activeFilters.delete('amenities');
      this.activeFilters.set('amenities', array);
    },
  },
};
// Slider Range Km
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

.btn-filter{
    border: none;
    color: $boolean-green;
    background-color: $boolean-blue;

    &:hover {
      background-color: $boolean-green;
      color: $boolean-blue;
    }
}

.amenity_card {
  width: 100vw;
  .amenity_icon {
    display: flex;
    gap: 20px;
    .icon {
      display: flex;
      flex-direction: column;
      align-items: center;
      i {
        font-size: 22px;
      }
      span {
        font-size: 11px;
      }
    }
  }
}
li,
ul {
  list-style: none;
}

// amenities icon as buttons
.amenity-button {
  padding: 5px;
  background-color: transparent;
  border: none;
  opacity: 0.7;
  transition: 200ms;
  color: $boolean-blue;
  &:focus {
    color: $boolean-green;
    opacity: 1;
    transform: scale(1.1);
  }
  &:hover {
    color: $boolean-green;
    opacity: 1;
    transform: scale(1.1);
  }
}

.clickedAmenity {
  opacity: 1;
  transform: scale(1.1);

  &:after {
    content: "";
    display: block;
    border-bottom: 1px solid $boolean-blue;
    width: 100%;
  }
}

.save-changes{
  background-color: $boolean-blue;
  color: $boolean-green;
  border: none;

  &:hover{
    background-color: $boolean-green;
    color: $boolean-blue;
  }
}

/*animation key frames*/
@keyframes anim {
  0% {
    right: -20px;
  }
  25% {
    right: -10px;
  }
  50% {
    right: -30px;
  }
  70% {
    right: -10px;
  }
  100% {
    right: -20px;
  }
}
.filter{
  width: 100px;
  height: 37px;
}
</style>