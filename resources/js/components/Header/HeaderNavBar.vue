<template>
  <div id="header_nav_bar">
    <nav class="navbar">
      <div class="logo">qui va il logo</div>
      <form class="form-inline">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button>
      </form>
      <div class="right_nav_bar">qui va "diventa host, button login"</div>
    </nav>

    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "HeaderNavBar",
};
</script>

<style lang="scss" scoped>
.container {
  width: 100vw;
  display: flex;
  justify-content: space-between;
}
.logo {
  border: 1px solid black;
  width: 100px;
  height: 50px;
}

.right_nav_bar {
  border: 1px solid red;
  width: 200px;
}
</style>