<template>
  <div>
    <h1>APP.VUE</h1>    
    <my-header />
    <!-- <router-link to="{name: 'place.index'}">Show all posts</router-link> -->

    <router-view></router-view>


  </div>
</template>

<script>
import MyHeader from "../components/Header/MyHeader.vue";

export default {
  name: 'App',
  components: {
    MyHeader,
  },
};
</script>

<style>

</style>