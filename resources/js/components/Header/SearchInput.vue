<template>
  <form class="myForm form-inline">
    <input
      id="address-modal"
      class="myInput form-control mr-sm-2"
      type="search"
      placeholder="Search"
      aria-label="Search"
      data-toggle="modal"
      data-target="#exampleModal"
      v-model="searchInput"
      v-on:keyup="fetchAdress(searchInput)"
    />

    <div class="addressList rounded border border-primary" v-show="searchResults.length != 0">
        <router-link to="/advanced_search" 
            class="suggestions d-block text-dark" 
            v-for="(result, index) in searchResults" :key="index">
            {{ composeAddress(result.address) }}
        </router-link>
    </div>

    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
    >
      Search
    </button>
  </form>
</template>

<script>
import axios from "axios";
// import state from "../../host/store.js";

export default {
  data() {
    return {
      TOMTOM_API_KEY: "yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj",
      searchInput: "",
      searchResults: [],
    };
  },

  methods: {
    fetchAdress(searchInput) {
      console.log(searchInput);

      axios
        .get(`https://api.tomtom.com/search/2/geocode/${searchInput}.json`, {
          params: {
            key: this.TOMTOM_API_KEY,
          },
        })
        .then((res) => {
          const { results } = res.data;
          this.searchResults = results;

          console.log(this.searchResults);
        })
        .catch((err) => {
          console.log(err);
        });
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
            countrySecondarySubdivision;
        if (country != null) str += ", " + country;

        return str;
    },

    showSuggestions() {
        
    },
  },
};
</script>

<style lang="scss" scoped>
ul,
li {
  list-style: none;
}

.myForm{
    position: relative;
    padding-bottom: 8px;

    .addressList{
        position: absolute;
        top: 100%;
        background: #fff;
        z-index: 10;

        .suggestions{
            padding: 10px 20px;
            line-height: 2.3em;
            border-bottom: 1px solid gainsboro;
            cursor: pointer;

            &:hover{
                background-color: whitesmoke;
                
            }
        }
    }
}
</style>