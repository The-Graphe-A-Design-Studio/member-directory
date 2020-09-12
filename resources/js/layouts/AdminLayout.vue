<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >
      <v-list dense>

        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-account</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Users</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-cog</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Settings</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link v-on:click="adminlogout">
          <v-list-item-action>
            <v-icon>mdi-power</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      clipped-left
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application {{ loggedIn }}</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col class="shrink">
            <v-tooltip right>
              <!-- <template v-slot:activator="{ on }">
                <v-btn
                  :href="source"
                  icon
                  large
                  target="_blank"
                  v-on="on"
                >
                  <v-icon large>mdi-code-tags</v-icon>
                </v-btn>
              </template>
              <span>Source</span> -->
              <admin-section />
            </v-tooltip>
          </v-col>
        </v-row>
      </v-container>
    </v-main>

    <v-footer app>
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    name: 'AdminLayout',
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
    computed: {
      loggedIn: {
        get() {
          return this.$store.state.currentAdmin.loggedIn;
        }
      },
      currentAdmin: {
        get() {
          return this.$store.state.currentAdmin.admin.name;
        }
      }
    },
    created() {
      this.$vuetify.theme.dark = true
      if(localStorage.hasOwnProperty("admin_token")){
        console.log("Yes entering");
        axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("admin_token");
        this.$store.dispatch('currentAdmin/getAdmin');
        // console.log(this.$store.state.currentAdmin.admin);
      }
      //   window.location.replace("/admin/login");
      // }
    },
    methods: {
        adminlogout() {
          // axios.post('/admin/logout')
          // .then((response) => {
          //     window.location.href = "admin";
          // })
          console.log("Logout");
          // this.$store.dispatch('currentAdmin/logoutAdmin');
        }
    }
  }
</script>