<template>
    <div class="amenities">
        <h5>Essential services</h5>

        <div v-for="(amenity, i) in amenities" :key="i" class="form-group form-check">
            <input type="checkbox" 
            class="form-check-input" 
            :value="amenity.name" 
            v-model="checkedAmenities"
            @change="returnValue($event)" 
            />

            <label class="form-check-label" :for="amenity.name">{{ amenity.name }}</label>
        </div>

        <span>Checked amenities: {{ checkedAmenities }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            amenities: Array,
        },
        data() {
            return {
                checkedAmenities: [],
            }
        },

        methods: {
            // fetchAmenities() {
            //     axios.get("/api/amenities").then((res) => {
            //         this.amenities = res.data.amenities;
            //     });
            // },

            returnValue: function(e) {
                console.log(this.amenities);

                const filter = {
                    'name': 'amenities',
                    'value': this.checkedAmenities,
                };

                console.log(filter);
                this.$emit('pick-filter', filter);
            },

        },

        beforeMount() {
            // this.fetchAmenities();
        }
    }
</script>

<style lang="scss" scoped>

</style>