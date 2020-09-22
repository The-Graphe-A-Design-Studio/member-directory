<template>
  <div class="container px-3">
    <ul>
      <li v-for="(error, key) in errors" :key="key">{{ error[0] }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  computed: {
    errors: {
      get() {
        return this.$store.state.currentUser.errors;
      },
    },
  },
};
</script>