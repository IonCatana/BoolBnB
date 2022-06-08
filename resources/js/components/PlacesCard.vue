<template>
    <div class="card mx-2 mb-4" style="width: 19rem;">
        <figure class="img-wrapper mb-0">
            <img v-if="place.img == null" class="place-img w-100 p-3" src="https://a0.muscache.com/im/pictures/04355deb-8003-47c5-8ef8-1ebca56d7720.jpg?im_w=1440" alt="">
            <img v-else :src=" `/storage/${place.img}`" class="place-img w-100 p-3" alt="">
        </figure>

        <div class="card-body py-0 pb-5">
            <h5 class="card-title mb-2">{{ place.title }}</h5>
            <p class="card-text mb-2">{{ place.address }}</p>
            <div class="d-flex mb-4 justify-content-center">
                <span class="card-text mr-2 text-dark" v-for="amenity in place.amenities" :key="amenity.id"><i :class="amenity.icon"></i></span>
            </div>
            <div class="text-center">
                <router-link :to="{ name:'places.show', params:{ slug: place.slug, place } }" class="detail">Show this place!</router-link>
            </div>
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
@import '../../sass/_variables.scss';

.card {
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid gainsboro;

    .img-wrapper{
        height: 65%;

        .place-img {
            border-radius: 20px;
            height: 100%;
            object-fit: cover;
        }
    }

    .card-text{
        color: gray;
    }

    .detail{
        color: $boolean-blue;
        background-color: #a0f1c6;
        padding: 8px 10px;

        &:hover{
            background-color: #5dd394; 
            color: white;  
            text-decoration: none;
        }
    }
}
</style>