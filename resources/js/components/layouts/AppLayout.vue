<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-banner color="indigo" dark align="center" justify="center">
        <img v-bind:src="prfimg" :style="{ width: '200px' }" />
      </v-banner>
      <v-list dense>
        <v-list-item link to="/dashboard">
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/members">
          <v-list-item-action>
            <v-icon>mdi-account</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Members</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/groups">
          <v-list-item-action>
            <v-icon>mdi-email</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Groups</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link @click="logout">
          <v-list-item-action>
            <v-icon>mdi-power</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="indigo" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application {{ currentUser.loggedIn }}</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container class="fill-height" fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
    <v-footer color="indigo" app>
      <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: "AppLayout",
  props: {
    source: String,
  },
  data: () => ({
    drawer: null,
  }),
  computed: {
    loggedIn: {
      get() {
        return this.$store.state.currentUser.loggedIn;
      },
    },
    currentUser: {
      get() {
        return this.$store.state.currentUser.user;
      },
    },
    prfimg: {
      get() {
        if (this.$store.state.currentUser.user.photo == null) {
          return "http://localhost/memberdir/storage/app/profile_pic/default.img";
        } else {
          return (
            "http://localhost/memberdir/storage/app/profile_pic/" +
            this.$store.state.currentUser.user.photo
          );
        }
      },
    },
  },
  created() {
    if (localStorage.hasOwnProperty("user_token")) {
      axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("user_token");
      this.$store.dispatch("currentUser/getUser");
      console.log(this.$store.state.currentUser.user);
    } else {
      window.location.replace("/login");
    }
  },
  methods: {
    logout() {
      // axios.post('/users/logout')
      // .then((response) => {
      //   window.location.href = "login";
      // })
      this.$store.dispatch("currentUser/logoutUser");
    },
  },
};
</script>