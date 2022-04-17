<template>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" v-if="this.authData === null">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand">Home</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
          <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <router-link
                  to="/login"
                  class="nav-link active"
                  aria-current="page"
                  >Login</router-link
                >
              </li>
              <li class="nav-item">
                <router-link
                  to="/register"
                  class="nav-link active"
                  aria-current="page"
                  >Register</router-link
                >
              </li>
            </ul>
          </form>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" v-else>
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand">Home</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <button @click="logout()">Logout</button>
            </ul>
        </div>
      </div>
    </nav>
    <router-view> </router-view>
  </div>
  
</template>

<script>
import Auth from "./Auth.js";
import Navbar from "../js/components/Navbar.vue";
export default {
  components: { Navbar },
  data() {
    return {
      loggedUser: this.auth.user,
      authData : ''
    };
  },
  mounted() {
    this.authData = localStorage.getItem("user")
    console.log(this.auth.user);
  },
  methods: {
    logout() {
      localStorage.removeItem("user");
      localStorage.removeItem("token");
      this.$router.push("/login");
    },
  },
};
</script>