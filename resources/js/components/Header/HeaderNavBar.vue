<template>
  <div id="header_nav_bar">
    <nav class="navbar d-flex justify-content-between">
      <div class="logo">
        <a href="/"><img :src="'../../assets/img/Logo.jpg'" alt="" /></a>
      </div>
      <form class="form-inline">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          <a href="/advanced_search">Search</a>
        </button>
      </form>
      <div class="right_nav_bar d-flex align-items-center">
        <a class="dropdown-item" href="#"
          >Become a host <i class="fas fa-globe"></i
        ></a>
        <div class="dropdown dropleft">
          <a
            class="btn btn-secondary dropdown-toggle"
            href="#"
            role="button"
            id="dropdownMenuLink"
            data-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="far fa-user"></i>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/register">Register</a>
            <a class="dropdown-item" href="/login">Login</a>
          </div>
        </div>
      </div>
    </nav>
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
  width: 35px;
  height: 70px;
}

img {
  width: 100%;
  height: 100%;
}
a {
  text-decoration: none;
}
</style>