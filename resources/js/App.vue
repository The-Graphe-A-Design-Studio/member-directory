<template>
  <div>
    <navbar :app="this" class="mb-2"></navbar>
    <router-view :app="this" />
  </div>
</template>
<script>
import Navbar from "./components/Navbar";
export default {
  name: "app",
  components: {
    Navbar,
  },
  data() {
    return {
      user: null,
      loading: false,
      initiatiated: false,
      req: axios.create({
        baseUrl: BASE_URL,
      }),
    };
  },
  mounted() {
    this.loading = true;
    axios
      .get("https://developers.thegraphe.com/member-directory/user/init")
      .then((response) => {
        this.user = response.data.user;
        this.loading = false;
        this.initiatiated = true;
      });
  },
};
</script>