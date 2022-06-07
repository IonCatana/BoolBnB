<template>
  <div id="header_nav_bar">
    <nav class="navbar d-flex justify-content-between px-5">
      <a href="/" class="logo d-flex align-items-center">
        <img class="mr-2" :src="'../../assets/img/Logo.png'" alt="" />
        <h4 class="project-name">BoolBnb</h4>
      </a>

      <SearchInput/>

      <div class="right_nav_bar d-flex align-items-center">
        <a class="become-host dropdown-item" href="#">Become a host </a>
        <a class="text-dark"  href=""> <i class="fas fa-globe mr-4 ml-2"></i> </a>
        <div class="dropdown dropleft">
          <a
            class="login btn dropdown-toggle"
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
import SearchInput from './SearchInput.vue'

  export default {
    name: "HeaderNavBar",
    components: {
      SearchInput,
    },
  };
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';

a {
  text-decoration: none;
}

.navbar{
  border-bottom: 1px solid #e6e6e6;
  
  .logo {
    height: 70px;
  
    img {
      width: 20%;
    }
  
    .project-name {
      background-image: linear-gradient(60deg, $boolean-blue, $boolean-green);
      background-clip: text;
      color: transparent;
    }
  }

  .become-host{
    border-radius:50px;
  }

  .login{
    background-color: $boolean-green;
    color: $boolean-blue;

    &:hover{
      color: $boolean-green;
      background-color: $boolean-blue;
    }
  }
}
</style>