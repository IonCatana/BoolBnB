<template>
  <div id="advanced_search">
    <div class="amenity_card align-items-center d-flex justify-content-center">
      <div class="amenity_icon">
        <div v-for="amenity in amenities" :key="amenity.id" class="icon">
          <i :class="amenity.icon"></i>
          <span>{{ amenity.name }}</span>
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
                <div class="range_km">
                  <h1>Range km</h1>
                  <p>Drag the slider to display the current value.</p>
                  <div class="slidecontainer">
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="myRange"
                    />
                    <p>Value: <span id="demo"></span> km</p>
                  </div>
                </div>
                <div class="rooms_beds">
                  <h2>Rooms and Beds</h2>
                  <div class="room">
                    <p>Room</p>
                    <button>Any</button>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>5</button>
                    <button>6+</button>
                  </div>
                  <div class="dropdown-divider"></div>

                  <div class="bed">
                    <p>Bed</p>
                    <button>Any</button>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>5</button>
                    <button>6+</button>
                  </div>
                  <div class="bathroom">
                    <p>Bathroom</p>
                    <button>Any</button>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>5</button>
                    <button>6+</button>
                  </div>
                </div>
                <div class="dropdown-divider"></div>

                <div class="amenities">
                  <h2>Amenity</h2>
                  <h5>Essential services</h5>
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
                  </div>
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
export default {
  components: {},
  data() {
    return {
      amenities: [],
    };
  },
  methods: {
    fetchAmenities() {
      axios.get("/api/amenities").then((res) => {
        console.log(res.data);
        this.amenities = res.data.amenities;
      });
    },
  },
  mounted() {
    this.fetchAmenities();
  },
};
// Slider Range Km
// const slider = document.getElementById("myRange");
// const output = document.getElementById("demo");
// output.innerHTML = slider.value;

// slider.oninput = function () {
//   output.innerHTML = this.value;
// };
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

// Slide Range Km
.slidecontainer {
  width: 100%;
  .slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: 0.2s;
    transition: opacity 0.2s;
  }
  .slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #04aa6d;
    cursor: pointer;
  }
  .slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #04aa6d;
    cursor: pointer;
  }
  .slider:hover {
    opacity: 1;
  }
}
</style>