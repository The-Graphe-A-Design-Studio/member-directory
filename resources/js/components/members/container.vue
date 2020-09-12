<template>
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
</script>