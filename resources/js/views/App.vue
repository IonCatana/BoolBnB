<template>
  <div>
    <h1>APP</h1>
    <Places />
    <!-- <router-link to="{name: 'place.index'}">Show all posts</router-link> -->

    <router-view></router-view>
  </div>
</template>

<script>
import Places from '../pages/Place.index.vue'

export default {
  name: 'App',
  components: {
    Places,
  }
}
</script>

<style>

</style>