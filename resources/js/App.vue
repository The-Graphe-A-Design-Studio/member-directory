<template>
  <div>
    <router-view :app="this" />
  </div>
</template>
<script>
export default {
  name: "app",
  data() {
    return {
      user: null,
      admin: null,
      loading: false,
      initiatiated: false,
      req: axios.create({
        baseUrl: BASE_URL,
      }),
    };
  },
  mounted() {
    this.init();
    // this.admininit();
    // window.addEventListener("hashchange", function (e) {
    //   // this.changedUrl();
    //   console.log(this.location.hash);
    //   var str = this.location.hash;
    //   var bool = str.search("admin");
    //   this.currentUrl = bool;
    //   console.log("URL:" + this.currentUrl);
    // });
  },
  methods: {
    init() {
      this.loading = true;
      this.req.get("/user/init").then((response) => {
        this.user = response.data.user;
        this.loading = false;
        this.initiatiated = true;
      });
    },
  },
};
</script>