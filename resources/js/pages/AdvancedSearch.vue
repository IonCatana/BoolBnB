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
            class="btn btn-primary ml-4"
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
                <RangeFilter @pick-filter="addFilter" />

                <!-- rooms, beds & bathrooms -->
                <div class="rooms_beds">
                  <h2>Rooms, Beds & Bathrooms</h2>

                  <ButtonFilter name="Rooms" @pick-filter="addFilter" />
                  <ButtonFilter name="Beds" @pick-filter="addFilter" />
                  <ButtonFilter name="Bathrooms" @pick-filter="addFilter" />
                </div>

                <div class="dropdown-divider"></div>

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
                  class="btn btn-primary"
                  @click="queryDatabase"
                  data-dismiss="modal"
                >
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      v-if="!loading"
      class="card-wrapper d-flex flex-wrap justify-content-center"
    >
      <PlacesCard
        tag="div"
        v-for="place in places"
        :key="place.id"
        :place="place"
      />
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

  data() {
    return {
      amenities: [],
      // value: "0",
      activeItem: null,

      // i filtri, per popolare la query
      activeFilters: new Map(),
      checkedAmenities: [],

      // la risposta del server alla chiamata api/search_area
      // TODO se places è vuoto: recupera query da $route e rifai chiamata -> watch: places????
      places: [],
      loading: false,
    };
  },

  // watch: {
  //   $route(to, from) {
  //     this.queryDatabase();
  //   }
  // },

  methods: {
    fetchAmenities() {
      axios.get("/api/amenities").then((res) => {
        this.amenities = res.data.amenities;
      });
    },

    // warning: function () {
    //   if (this.value > 1) {
    //     return {
    //       color: "#e74c3c",
    //       animation: "anim .3s ease-in 1 alternate",
    //     };
    //   }
    // },

    selectItem: function (i) {
      this.activeItem = i;
    },

    queryDatabase() {
      // this.updateRoute();
      const params = this.prepareParams();

      axios
        .get("/api/search_area", { params })
        .then((res) => {
          this.loading = true;
          this.places = res.data.places;
          this.loading = false;

          console.log("data", res);
          console.log("places", this.places);
          console.log("route", this.$route);
        })
        .catch((err) => {
          console.warn(err);
        });
    },

    prepareParams() {
      const { lat, lon } = this.$route.params.result.position;
      
      let filters, amenities;
      if (this.activeFilters.size !== 0) filters = Object.fromEntries(this.activeFilters);

      const params = { lat, lon, ...filters};
      console.log('params', params)
      return params;
    },

    // prepareQuery() {

    // },

    updateRoute() {
      if (!_.isEmpty(this.activeFilters)) {
        this.activeFilters.forEach((value, filter) => {
          if (filter === "amenities") {
            value.forEach((amenityId, index) => {
              this.query.set(`amenity[${index}]`, amenityId);
            });
          } else {
            this.query.set(filter, value);
          }
        });
      }
      // console.log('filters', this.activeFilters)
      // console.log('query', this.query)
    },

    composeAddress(address) {
      let {
        freeformAddress,
        countrySubdivision,
        countrySecondarySubdivision,
        country,
        municipality,
      } = address;
      let str = "";

      if (freeformAddress != null) str += freeformAddress;
      if (countrySubdivision != null) str += ", " + countrySubdivision;
      if (
        countrySecondarySubdivision != null &&
        countrySecondarySubdivision !== municipality
      )
        str += ", " + countrySecondarySubdivision;
      if (country != null) str += ", " + country;

      return str;
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

  beforeMount() {
    this.fetchAmenities();
    this.queryDatabase();
  },
};
// Slider Range Km
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
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