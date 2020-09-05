<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <router-link class="nav-link" to="/">Home</router-link>

        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li class="nav-item dropdown">
            <!-- <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >{{app.user ? app.user.name : "Account"}}</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" v-if="!app.user">
              <router-link class="nav-link" to="/admin/login">Login</router-link>
              <router-link class="nav-link" to="/admin/register">Register</router-link>
            </div>-->
            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown" v-else> -->
            <a class="nav-link" @click="adminLogout" href="javascript:;">Logout</a>
            <!-- </div> -->
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  name: "adminnavbar",
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  props: ["app"],
  methods: {
    adminLogout() {
      axios.post(BASE_URL + "/admin/logout").then(() => {
        this.$router.push("/admin/login");
        window.location.reload();
      });
    },
  },
};
</script>