<template>
  <div id="advanced_search">
    <div class="amenity_card align-items-center d-flex justify-content-center">
      <div class="amenity_icon">
        <div v-for="(amenity, i) in amenities" :key="amenity.id" class="icon" :class="{clickedAmenity : i === activeItem}">
          <button class="amenity-button" @click="selectItem(i)">
            <i :class="amenity.icon"></i>
            <span class="d-block">{{ amenity.name }}</span>
          </button>
        </div>
      </div>

      <li class="nav-item dropdown">
        <!-- Button trigger modal -->
        <button
          type="button"
          class="btn btn-primary ml-4"
          data-toggle="modal"
          data-target="#exampleModal"
        >
          <i class="fas fa-sort"></i>
          Filter
        </button>

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
                  <AmenitiesFilter @pick-filter="addFilter" :amenities="amenities"/>
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

                <button type="button" class="btn btn-primary">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </li>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import RangeFilter from "../components/filters/RangeFilter.vue";
import ButtonFilter from '../components/filters/ButtonsFilter.vue';
import AmenitiesFilter from "../components/filters/AmenitiesFilter.vue";

export default {
  components: {
    RangeFilter,
    ButtonFilter,
    AmenitiesFilter,
  },

  data() {
    return {
      amenities: [],
      // value: "0",
      activeItem: null,

      // i filtri, per popolare la query
      activeFilters: new Map(),

      // da passare nella chiamata al server
      params: null,
      query: null,
      // la risposta del server alla chiamata api/search_area
      // TODO se places è vuoto: recupera query da $route e rifai chiamata -> watch: places????
      places: [],
    };
  },

  methods: {
    fetchAmenities() {
      axios.get("/api/amenities").then((res) => {
        console.log(res.data);
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
      console.log(i);
      this.activeItem = i;
    },

    queryDatabase() {
      this.prepareQuery();

      axios.get('/api/search_area/45.4636/9.1881', { 
        query: this.query,
      })
      .then((r) => {
        console.log(r.data);
      })
      .catch(err => {
        console.warn(err)
      })
    },

    prepareQuery() {      
      const { lat, lon } = this.$route.params.result.position;

      this.query = { lat, lon };
      console.log('before', this.params)

      if (!_.isEmpty(this.activeFilters)) {
        for (let filter of this.activeFilters) {
          // this.query[filter.name] = filter.value;
        }
      }
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
            str += ', ' + countrySecondarySubdivision;
        if (country != null) str += ", " + country;

        return str;
    },

    addFilter(filter) {
      if (filter.value == null) {
        this.activeFilters.delete(filter.name)
        // console.log('length', filter.value.length)
        return
      }

      this.activeFilters.set(filter.name, filter.value);

      if (this.activeFilters.get('amenities')?.length === 0) this.activeFilters.delete('amenities');
      console.log('activefilter', this.activeFilters);
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
  opacity: 0.6;

  &:hover {
    opacity: 1;
    transform: scale(1.1);
  }
}

.clickedAmenity  {
  opacity: 1;
  transform: scale(1.1);

  &:after {
    content: "";
    display: block;
    border-bottom: 1px solid black;
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
</style>