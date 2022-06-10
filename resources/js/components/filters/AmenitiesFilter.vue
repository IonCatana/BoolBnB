<template>
    <div class="amenities">
        <h5>Essential services</h5>

        <div v-for="(amenity, i) in amenities" :key="i" class="form-group form-check">
            <input type="checkbox" 
            class="form-check-input" 
            :id="amenity.name" 
            :value="amenity.id"
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
            returnValue: function(e) {
                // const filter = {
                //     'name': 'amenities',
                //     'value': this.checkedAmenities,
                // };

                console.log('checked', this.checkedAmenities);
                this.$emit('pick-filter', this.checkedAmenities);
            },

        },
    }
</script>

<style lang="scss" scoped>

</style>