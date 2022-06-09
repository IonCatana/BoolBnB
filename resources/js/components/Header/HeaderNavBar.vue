<template>
    <nav class="navbar d-flex justify-content-between px-5">
      <a href="/" class="logo d-flex align-items-center mb-3">
        <img class="mr-2" :src="'../../assets/img/Logo.png'" alt="" />
        <h4 class="project-name">BoolBnb</h4>
      </a>

      <SearchInput/>

      <!-- TODO al posto di Become a host mettere l'utente loggato -->
      <!-- Menu normale -->
      <div class="full-menu">
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

      <!-- Hamburger menu -->
      <div class="hamburger-container">
          <ul class="hamburger-menu rounded py-3" :class="[this.clicked ? 'show' : 'hide']">
              <li>
                  <a class="become-host dropdown-item" href="#">Become a host </a>
              </li>
              <li>
                  <a class="dropdown-item" href="/register">Register</a>
              </li>
              <li>
                  <a class="dropdown-item" href="/login">Login</a>
              </li>
          </ul>

          <div class="icons">
              <!-- x per chiudere hamburger -->
              <i class="fas fa-bars" @click="click()" :class="{'hide' : this.clicked}"></i> 
              <!-- 3 barre -->
              <i class="fas fa-times" @click="click()" :class="{'hide' : !this.clicked}"></i>
          </div>
      </div>
    </nav>
  <!-- <div id="header_nav_bar">
  </div> -->
</template>

<script>
import SearchInput from './SearchInput.vue'

  export default {
    name: "HeaderNavBar",
    components: {
      SearchInput,
    },

    data () {
      return {
        index: 0,
        clicked: false,
      }
    },

    methods: {
      click: function () {
          if(this.index === 0){
              this.index++;
              this.clicked = true;
          }else{
              this.index--;
              this.clicked = false;
          }

          console.log('succede qualcosa', this.index, this.clicked)
      }
    }
  };
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';

li{
  list-style: none;
}

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

  .full-menu{
    display: flex;
    align-items: center;

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

  .hamburger-container{
    display: none;
  }
}

//Mediaqueries
@media screen and (max-width: 768px){
  .navbar{
    
    .full-menu{
      display: none;
    }

    .hamburger-container{
      display: block;
      position: relative;

      .hamburger-menu{
        position: absolute;
        z-index: 10;
        background-color: white;
        top: 100%;
        right: 0;
        box-shadow: 0px 0px 7px 0px gainsboro;
        margin-top: 10px;
      }

      .show{
        display: block;
      }

      .hide{
        display: none;
      }

      .icons{
        width: 25px;
        text-align: center;

        .fas{//icone
          font-size: 1.5rem;
          color: $boolean-green;

          &:hover{
            color: $boolean-blue;
          }
        }
      }

    }
  }
}

@media screen and (max-width: 575px){
    .navbar{
      flex-direction: column;
      align-items: flex-start;
      position: relative;

      .hamburger-container{
        position: absolute;
        top: 28px;
        right: 50px;
      }
    }

}
</style>
