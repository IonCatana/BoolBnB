<template>
  <div>
    <h1>APP.VUE</h1>    
    <MyHeader />
    <Places /> <!-- Places import in to MyMain.vue "later" -->
    <!-- <router-link to="{name: 'place.index'}">Show all posts</router-link> -->

    <router-view></router-view>
    
  </div>
</template>

<script>

import MyHeader from "../components/Header/MyHeader.vue";
import Places from "../pages/Place.index.vue";

export default {
  name: "App",
  components: {
    MyHeader,
    Places,
  },
};
</script>

<style>


</style>