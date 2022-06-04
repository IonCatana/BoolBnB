<template>
    <form class="form-inline">
        <input
            id="address-modal"
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
            v-model="searchInput"
            v-on:keyup="fetchAdress(searchInput)"
        />

        <!-- VEDI IL MODAL IN CREATE.BLADE MA FAR SPUNTARE LE SEARCH SUGGESTIONS SOTTO IL SEARCH-->

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <a href="/advanced_search">Search</a>
        </button>
    </form>
</template>

<script>
import axios from "axios";
import state from "../../host/store.js";

    export default {
        data() {
            return {
                TOMTOM_API_KEY : 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj',
                searchInput: '',
                searchResults: [],
            }
        },

        methods: {
            fetchAdress(searchInput) {
            console.log(searchInput)
            
            axios.get(`https://api.tomtom.com/search/2/geocode/${searchInput}.json`, {
                params: {
                'key': this.TOMTOM_API_KEY,
                }

            }).then((res) => {
                const { results } = res.data;
                this.searchResults = results;
                state.searchResults = this.searchResults;

                // USARE ADATTANDO QUELLO CHE C'È IN addressMatches

                results.forEach((result, index) => {
                    console.log(result.address)
                });

            })
            .catch(err => {
                console.log(err);
            })
            },

            
        },
    }
</script>

<style lang="scss" scoped>

</style>