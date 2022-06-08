<template>
    <div class="amenities">
        <h5>Essential services</h5>

        <div v-for="amenity in amenities" :key="amenity.id" class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                :value="amenity.name" :checked="getAmenities()" v-model="checkbox"
            />

            <label class="form-check-label" for="exampleCheck1">
                {{ amenity.name }}
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                amenities: [],
                filterAmenities: [],
                checkbox: null,
            }
        },
        methods: {
            fetchAmenities() {
                axios.get("/api/amenities").then((res) => {
                    this.amenities = res.data.amenities;
                });
            },

            getAmenities: function() {
                // this.checkbox = e.target.value;

                if(this.checkbox.checked){
                    this.filterAmenities.push(this.checkbox);
                    console.log(this.filterAmenities);
                }
            },
        },

        beforeMount() {
            this.fetchAmenities();
        }
    }
</script>

<style lang="scss" scoped>

</style>