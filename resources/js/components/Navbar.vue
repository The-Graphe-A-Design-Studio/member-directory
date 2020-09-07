<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <router-link class="nav-link" to="/">Home</router-link>

        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >{{app.user ? app.user.name : "Account"}}</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" v-if="!app.user">
              <router-link class="nav-link" to="/login">Login</router-link>
              <router-link class="nav-link" to="/register">Register</router-link>
            </div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" v-else>
              <a class="nav-link" @click="userLogout" href="javascript:;">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  name: "navbar",
  data() {
    return {
      // csrf: document
      //   .querySelector('meta[name="csrf-token"]')
      //   .getAttribute("content"),
    };
  },
  props: ["app"],
  methods: {
    userLogout() {
      axios.post(BASE_URL + "/logout").then(() => {
        this.app.user = null;
        this.$router.push("/login");
      });
    },
  },
};
</script>