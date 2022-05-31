<template>
    <div>
        <div v-for="place in places" :key="place.id">
            {{place.title}}
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        components: {

        },

        data() {
            return {
                places: []
            }
        },

        methods: {
            fetchPlaces () {
                axios.get ('/api/places')
                .then (res => {
                    // console.log(res.data);
                    this.places = res.data.places;
                })
            }
        },

        mounted() {
            this.fetchPlaces();
        },
    }
</script>

<style lang="scss" scoped>

</style>