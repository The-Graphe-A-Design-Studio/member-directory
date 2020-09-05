<template>
  <div class="container">
    <navbar :app="app" class="mb-2"></navbar>
    <h2>Home</h2>
  </div>
</template>
<script>
import Navbar from "../components/Navbar";
export default {
  name: "home",
  props: ["app"],
  components: {
    Navbar,
  },
};
</script>