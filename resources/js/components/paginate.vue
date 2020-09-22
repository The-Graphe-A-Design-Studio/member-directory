<template>
  <v-pagination v-model="currentPage" :length="lastPage"></v-pagination>
</template>
<script>
export default {
  props: ["store", "collection", "list"],
  watch: {
    currentPage(newVal, oldVal) {
      this.paginatePage(newVal);
    },
  },
  computed: {
    currentPage: {
      get() {
        return this.$store.state[this.store][this.collection].current_page;
      },
      set(value) {
        this.$store.commit(this.store + "/setCurrentPage", value);
      },
    },
    lastPage: {
      get() {
        return this.$store.state[this.store][this.collection].last_page;
      },
    },
  },
  methods: {
    paginatePage(pageNumber) {
      this.$store.dispatch(this.store + "/" + this.list, pageNumber);
    },
  },
};
</script>