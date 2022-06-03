<template>
  <div id="my_header" class="mb-4">
    <header-nav-bar />
  </div>
</template>

<script>
import HeaderNavBar from "../Header/HeaderNavBar.vue";

export default {
  name: "MyHeader",
  components: {
    HeaderNavBar,
  },
};
</script>

<style lang="scss" scoped>
</style>