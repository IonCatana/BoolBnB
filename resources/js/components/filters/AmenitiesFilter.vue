<template>
    <div class="amenities">
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
            }
        },
        methods: {
            fetchAmenities() {
                axios.get("/api/amenities").then((res) => {
                    console.log(res.data);
                    this.amenities = res.data.amenities;
                });
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>