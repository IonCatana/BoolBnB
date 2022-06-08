<template>
  <div class="myForm form-inline w-25 d-flex">
    <input
      id="searchbox"
      class="border-0 form-control mr-sm-2"
      type="search"
      placeholder="Search"
      aria-label="Search"      
      v-model="searchInput"
      v-on:keyup="fetchAdress(searchInput)"
      @click="visible = true"
    />

    <!-- TODO quando cancello ogni singola lettera, quando arriva allúltima o a zero la chiamata da failed - SISTEMARE -->
    <!-- TODO quando clicco su uno degli apartamenti che verrà fuori dalla ricerca il visible diventa false così la barra dei suggerimenti scompare -->
    <!-- TODO quando seleziono il risultato che voglio, quello va nella box di search -->
    <!-- ho usato lo state per questo motivo -->

    <div class="suggestions-list rounded" 
    v-show="searchResults.length != 0 && visible==true" @click="visible = false">
        <router-link to="/advanced_search" 
            class="suggestion d-block text-dark" 
            v-for="(result, index) in searchResults" :key="index">
            {{ composeAddress(result.address) }}
        </router-link>
    </div>

    <button type="button" class="search-btn rounded-circle border-0" data-target="#searchInput">
      <i class="fa-solid fa-magnifying-glass p-2"></i>
    </button>
  </div>
</template>

<script>
import axios from "axios";
import state from "../../host/store.js";

export default {
  data() {
    return {
      TOMTOM_API_KEY: "yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj",
      searchInput: "",
      searchResults: [],
      visible: state.visibleSearch,
      choise: '',
    };
  },

  methods: {
    fetchAdress(searchInput) {
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
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';

ul, li {
  list-style: none;
}

.myForm{
  padding: 3px 3px;
  border: 1px solid gainsboro;
  border-radius: 50px;
  box-shadow: 0px 2px 5px gainsboro;
  overflow: hidden;
  flex-wrap: nowrap;

  &:hover{
    box-shadow: 0px 4px 5px 0px gainsboro;
  }

  #searchbox{
    position: relative;
    border-radius: 50px;
    flex-grow: 1;
    width: 80%;
  }

  .suggestions-list{
      position: absolute;
      top: 80%;
      background: #fff;
      z-index: 10;
      overflow-y: auto;
      max-height: 80vh;
      border: 1px solid gainsboro;

      .suggestion{
          padding: 10px 20px;
          line-height: 2.3em;
          border-bottom: 1px solid gainsboro;
          cursor: pointer;

          &:hover{
              background-color: whitesmoke;   
          }
      }
  }

  .search-btn{
    color: $boolean-green;
    background-color: $boolean-blue;
    width: 35px;
    aspect-ratio: 1/1;
  }
}

.hide{
    display: none;
}
</style>