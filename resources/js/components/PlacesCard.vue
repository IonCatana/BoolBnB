<template>
    <div class="card m-2" style="width: 18rem;">
        <img :src=" `/storage/${place.img}`" class="place-img w-100 p-3" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ place.title }}</h5>
            <p class="card-text">{{ place.address }}</p>
            <div class="d-flex">
                <span class="card-text mr-2" v-for="amenity in place.amenities" :key="amenity.id"><i :class="amenity.icon"></i></span>
            </div>
            <router-link :to="{ name:'places.show', params:{slug:place.slug} }" >Show this place!</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            place: {
                type: Object,
                required: false,
            }
        }
    }
</script>

<style lang="scss" scoped>
.card {
    border-radius: 20px;
    overflow: hidden;
    border: none;

    .place-img {
        border-radius: 20px;
    }
}
</style>