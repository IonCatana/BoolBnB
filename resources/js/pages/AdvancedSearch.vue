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
                <div class="container" id="app">
                  <h1>Slide range km</h1>
                  <input
                    v-model="value"
                    type="range"
                    class="mySlider"
                    min="0"
                    max="100"
                  />
                  <span :style="warning()" class="rangeValue">
                    {{ value }} km
                  </span>
                </div>

                <div class="rooms_beds">
                  <h2>Rooms and Beds</h2>
                  <ButtonFilter name="Rooms" @pick-filter="addFilter" />
                  <ButtonFilter name="Beds" @pick-filter="addFilter" />
                  <ButtonFilter name="Bathrooms" @pick-filter="addFilter" />
                </div>

                <div class="dropdown-divider"></div>

                <div class="amenities">
                  <h2>Amenity</h2>
                  <AmenitiesFilter />
                </div>

                  <!-- <h5>Essential services</h5>
                  <div
                    v-for="amenity in amenities"
                    :key="amenity.id"
                    class="form-group form-check"
                  >
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="exampleCheck1"
                    />
                    <label class="form-check-label" for="exampleCheck1">{{
                      amenity.name
                    }}</label>
                  </div> -->

                
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
import ButtonFilter from '../components/filters/ButtonsFilter.vue';
import AmenitiesFilter from "../components/filters/AmenitiesFilter.vue";

export default {
  components: {
    ButtonFilter,
    AmenitiesFilter,
  },

  data() {
    return {
      amenities: [],
      value: "0",
      activeItem: null,

      // i filtri, per popolare la query
      activeFilters: [
        { name: 'rooms', value: null, },
        { name: 'beds', value:null, },
        { name: 'bathrooms', value: null, }
      ],
      // da passare nella chiamata al server
      params: null,
      query: null,
      // la risposta del server alla chiamata api/search_area
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

    warning: function () {
      if (this.value > 1) {
        return {
          color: "#e74c3c",
          animation: "anim .3s ease-in 1 alternate",
        };
      }
    },

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
      //Find index of specific object using findIndex method.    
      let objIndex = this.activeFilters.findIndex((obj => obj.name == filter.name));

      //Log object to Console.
      console.log("Before update: ", this.activeFilters[objIndex])

      //Update object's name property.
      this.activeFilters[objIndex].value = filter.value;

      // console.log("After update: ", this.activeFilters[objIndex])
      // console.log('activefilter', this.activeFilters);
    },
  },

  beforeMount() {
    console.log(this.$route);
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

// Slide Range Km
.container .mySlider {
  appearance: none;
  width: 100%;
  background-color: #d3d3d3;
  border-radius: 20px;
  outline: none;
  opacity: 0.7;
  transition: opacity 0.2s ease-in;
  -webkit-transition: opacity 0.2s ease-in;
}

/*hover on range slider*/
.container .mySlider:hover {
  opacity: 1;
}

/* chrome and safari supporter */
.container .mySlider::-webkit-slider-thumb {
  appearance: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background-color: #e74c3c;
  cursor: pointer;
  transition: all 0.3s ease-in;
}

.container .mySlider::-moz-range-thumb {
  appearance: none;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background-color: #e74c3c;
  cursor: pointer;
  transition: all 0.3s ease-in;
  border: 2px solid #d3d3d3;
}

/* hover on slider thumb */
.container .mySlider::-webkit-slider-thumb:hover {
  box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.4);
}

/* Range Value Span */
.container .rangeValue {
  height: 40px;
  width: 60px;
  border: 1px solid #fff;
  color: #fff;
  font-weight: 600;
  text-align: center;
  font-size: 22px;
  line-height: 38px;
}

/* Draw with ::before on span*/
.container .rangeValue::before {
  content: "";
  height: 10px;
  width: 10px;
  transform: rotate(45deg);
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