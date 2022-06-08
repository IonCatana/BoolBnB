<template>
    <div class="container mb-5">
        <div class="row mb-3">
            <h1>{{place.title}}</h1>
        </div>

        <div class="row mb-4">
            <figure class="w-75">
                <img v-if="place.img == null" class="place-img w-100" src="https://a0.muscache.com/im/pictures/04355deb-8003-47c5-8ef8-1ebca56d7720.jpg?im_w=1440" alt="">
                <img v-else :src=" `/storage/${place.img}` " class="place-img w-100" alt="">
            </figure>
        </div>
        
        <div class="info row flex-column mb-4">
            <h4>Hosted by {{ host }}</h4>

            <ul class="d-flex rooms">
                <li class="bedrooms mr-3">{{place.rooms}} Rooms</li>
                <li class="beds mr-3">{{place.beds}} Beds</li>
                <li class="bathrooms mr-3">{{place.bathrooms}} Bathrooms</li>
            </ul>
        </div>

        <div class="amenities row flex-column">
            <h4>What this place offers</h4>
            <ul class="m-0">
                <li class="mr-3" v-for="amenity in amenities" :key="amenity.id">
                    <i :class="amenity.icon" class="mr-2"></i>
                    {{amenity.name}}
                </li> 
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            place: [],
            amenities: [],
            host:  "",
        }
    },

    methods: {
        fetchPlace() {
            axios.get(`/api/places/${ this.$route.params.slug }`)
            .then((res) => {
                const {place} = res.data;
                this.place = place;
                this.amenities = res.data.place.amenities;
                this.host = res.data.place.user.name;
            })
        },
        //TODO metter il catch error  
    },

    beforeMount() {
        this.fetchPlace();
    }
}
</script>

<style lang="scss" scoped>

li{
    list-style: none;
}

.place-img{
    border-radius: 15px;
}

.info{
    position: relative;

    &:after{
        content: "";
        display: block;
        position: relative;
        height: 1px;
        width: 100%;
        background-color: gainsboro;
        border-radius: 50%;
        top: 100%;
    }

    .rooms{

        .bedrooms, .beds{
            position: relative;
        
            &:after{
                content: "";
                display: block;
                position: relative;
                height: 3px;
                width: 3px;
                background-color: black;
                border-radius: 50%;
                bottom: 47%;
                left: 100%;
                margin-left: 6px;
            }
        }
    }
}



</style>