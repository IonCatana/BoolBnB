<template>
  <div>
    <my-header />
    <!-- <router-link to="{name: 'place.index'}">Show all posts</router-link> -->

    <router-view></router-view>

    <Footer />
  </div>
</template>

<script>
import MyHeader from "../components/Header/MyHeader.vue";
import Footer from "../components/Header/Footer.vue";

export default {
  name: "App",
  components: {
    MyHeader,
    Footer
  },
};
</script>

<style>
</style>