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
                <div class="range_price">
                  <h2>Fascia di prezzo</h2>
                  <p>il prezzo medio giornaliero é ...€</p>
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
</style>