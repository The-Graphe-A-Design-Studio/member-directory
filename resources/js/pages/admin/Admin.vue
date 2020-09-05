<template>
  <div>
    <adminnavbar :app="app" class="mb-2"></adminnavbar>
    <h1>Admin</h1>
  </div>
</template>
<script>
import Adminnavbar from "../../components/Adminnavbar";
export default {
  name: "admin",
  props: ["app"],
  components: {
    Adminnavbar,
  },
};
</script>