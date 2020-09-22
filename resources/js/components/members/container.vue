<template>
<<<<<<< HEAD
  <v-container fluid>
    <v-card>
      <v-simple-table class="w-100">
        <template v-slot:default>
          <thead>
            <tr>
              <td>Search</td>
              <td colspan="3">
                <input type="text" class="form-control" v-model="searchTerm" />
              </td>
            </tr>
            <tr>
              <th class="text-left">Name</th>
              <th class="text-left">Photo</th>
              <th class="text-left">DOB</th>
              <th class="text-left">Email</th>
              <th class="text-left">Contact</th>
              <th class="text-left">Designation</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="member in members" :key="member.id">
              <td>{{ member.name }}</td>
              <td>
                <div v-if="members.photo !== null">
                  <img
                    v-bind:src="imgurl +  member.photo"
                    :style="{ height: '100px' }"
                  />
                </div>
                <div v-else>
                  <img v-bind:src="defaultimg" :style="{ height: '100px' }" />
                </div>
              </td>
              <td>{{ member.dob }}</td>
              <td>{{ member.email }}</td>
              <td>{{ member.phone }}</td>
              <td>{{ member.designation }}</td>
              <td>{{ member.company }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-card>
    <!-- <paginate store="user" collection="users" v-bind:list="listname" /> -->
  </v-container>
</template>
<script>
// import paginate from "../paginate";
export default {
  data() {
    return {
      searchTerm: "",
      listname: "getList",
      imgurl: "http://localhost/memberdir/storage/app/profile_pic/",
      defaultimg:
        "http://localhost/memberdir/storage/app/profile_pic/default.png",
    };
  },
  watch: {
    searchTerm(newVal, oldVal) {
      if (newVal == "") this.listname = "getList";
      this.searchterm(newVal);
      this.listname = "searchList";
    },
  },
  // components: {
  //   paginate,
  // },
  computed: {
    members: {
      get() {
        return this.$store.state.user.users;
      },
    },
    pageLength: {
      get() {
        return this.$store.state.user.users.last_page;
      },
    },
  },
  created() {
    // this.$store.dispatch("user/getList", 0);
    this.$store.dispatch("user/getList");
  },
  methods: {
    searchterm(value) {
      // this.$store.dispatch("user/searchList", value, 0);
      this.$store.dispatch("user/searchList", value);
    },
  },
};
=======
        <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Name</th>
          <th class="text-left">Photo</th>
          <th class="text-left">DOB</th>
          <th class="text-left">Email</th>
          <th class="text-left">Contact</th>
          <th class="text-left">Designation</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in members" :key="item.name">
          <td>{{ item.name }}</td>
          <td>  </td>
          <td>{{ item.dob }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.contact }}</td>
          <td>{{ item.designation }}</td>
          <td>{{ item.company }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>
<script>
  export default {
    data () {
      return {
        
      }
    },
    computed: {
        members: {
            get() {
                return this.$store.state.user.users.data;
            }
        },
    },
    created() {
        this.$store.dispatch('user/getUsers');
    }
  }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
</script>