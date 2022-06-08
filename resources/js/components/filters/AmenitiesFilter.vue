<template>
    <div class="amenities">
        <h5>Essential services</h5>

        <div v-for="amenity in amenities" :key="amenity.id" class="form-group form-check">
            <input type="checkbox" class="form-check-input" :id="amenity.name" :value="amenity.name" v-model="checkedAmenities" />

            <label class="form-check-label" :for="amenity.name">{{ amenity.name }}</label>
        </div>

        <span>Checked amenities: {{ checkedAmenities }}</span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                amenities: [],
                checkedAmenities: [],
            }
        },

        methods: {
            fetchAmenities() {
                axios.get("/api/amenities").then((res) => {
                    this.amenities = res.data.amenities;
                });
            },

            getAmenities: function() {
                console.log(checkedAmenities);
            },
        },

        beforeMount() {
            this.fetchAmenities();
        }
    }
</script>

<style lang="scss" scoped>

</style>