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
        <ul>
            <li v-for="result in searchObject" :key="result.id">{{result.address}}</li>
        </ul>

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <a href="/advanced_search">Search</a>
        </button>
    </form>
</template>

<script>
import axios from "axios";
// import state from "../../host/store.js";

    export default {
        data() {
            return {
                TOMTOM_API_KEY : 'yQdOXmdWcQjythjoyUwOQaQSJBBNCvPj',
                searchInput: '',
                searchResults: [],
                searchObject: [{}],
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
                // state.searchResults = this.searchResults;
                console.log(this.searchResults);

                results.forEach((result, index) => {

                    const { address, position } = result;
                    const addressStr = this.composeAddress(address);

                    this.searchObject = [
                        {
                            'id' : index,
                            'address' : addressStr,
                        }
                    ]
                });

            })
                .catch(err => {
                    console.log(err);
                })
            },

            composeAddress(address) {
                let { freeformAddress, countrySubdivision, countrySecondarySubdivision, country, municipality } = address;
                let str = '';

                if (freeformAddress != null) str += freeformAddress;
                if (countrySubdivision != null) str += ', ' + countrySubdivision;
                if (countrySecondarySubdivision != null && countrySecondarySubdivision !== municipality) countrySecondarySubdivision;
                if (country != null) str += ', ' + country;
                
                return str;
            },

            // firstMatchTriggersOnEnter(element, str, position) {
            //     element.classList.add('active');
            //     addressInput.addEventListener('keypress', e => {
            //         if (e.key === 'Enter') {
            //             setCoordinatesToForm(position.lat, position.lon);
            //             setAddressToForm(str);
            //             $('#addressModal').modal('hide');
            //         }
            // });
            
        },

    }
</script>

<style lang="scss" scoped>

</style>