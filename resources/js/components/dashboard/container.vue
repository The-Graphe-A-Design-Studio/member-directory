<template>
  <div>
    Hello
    <br />Name:
    <div>
      <span>{{ currentUser.name }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.name ]]"
        v-model="user.name"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />DOB:
    <div>
      <span>{{ currentUser.dob }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.dob ]]"
        v-model="user.dob"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Email:
    <div>
      <span>{{ currentUser.email }}</span>
      <input
        type="email"
        class="form-control field"
        :placeholder="[[ currentUser.email ]]"
        v-model="user.email"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Phone:
    <div>
      <span>{{ currentUser.phone }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.phone ]]"
        v-model="user.phone"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Email:
    <div>
      <span>{{ currentUser.gender }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.gender ]]"
        v-model="user.gender"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Designation:
    <div>
      <span>{{ currentUser.designation }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.designation ]]"
        v-model="user.designation"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Classification:
    <div>
      <span>{{ currentUser.classification }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.classification ]]"
        v-model="user.classification"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Company:
    <div>
      <span>{{ currentUser.company }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.company ]]"
        v-model="user.company"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Blood Group:
    <div>
      <span>{{ currentUser.blood_group }}</span>
      <input
        type="text"
        class="form-control field"
        :placeholder="[[ currentUser.blood_group ]]"
        v-model="user.blood_group"
        :style="{ display: 'none' }"
      />
      <button @click="edit($event)">
        <v-icon>mdi-pencil</v-icon>
      </button>
      <button @click="done($event)" :style="{ display: 'none' }">
        <v-icon>mdi-check</v-icon>
      </button>
    </div>
    <br />Group ID:
    <div>
      <span>{{ currentUser.group_id }}</span>
    </div>
    <br />Sponsorer:
    <div>
      <span>{{ currentUser.sponsorer }}</span>
    </div>
  </div>
</template>
<script>
export default {
  data: () => ({
    user: {
      //   name: currentUser.name,
      //   dob: currentUser.dob,
      //   phone: currentUser.phone,
      //   email: currentUser.email,
      //   gender: currentUser.gender,
      //   designation: currentUser.designation,
      //   classification: currentUser.classification,
      //   company: currentUser.company,
      //   blood_group: currentUser.blood_group,

      name: "",
      dob: "",
      phone: "",
      email: "",
      gender: "",
      designation: "",
      classification: "",
      company: "",
      blood_group: "",
    },
    // name: this.$store.getters.currentUser.name,
  }),
  computed: {
    currentUser: {
      get() {
        return this.$store.state.currentUser.user;
      },
    },
  },
  created() {
    // this.user.name = currentUser.name;
    // this.user.dob = currentUser.dob;
    // this.user.phone = currentUser.phone;
    // this.user.email = currentUser.email;
    // this.user.gender = currentUser.gender;
    // this.user.designation = currentUser.designation;
    // this.user.classification = currentUser.classification;
    // this.user.company = currentUser.company;
    // this.user.blood_group = currentUser.blood_group;
  },
  methods: {
    edit(event) {
      //show the input field
      var target = event.target.parentNode.parentNode.children[0];
      var editbtn = event.target.parentNode;
      var inputfield = event.target.parentNode.parentNode.children[1];
      var donebtn = event.target.parentNode.parentNode.children[3];
      console.log(event.target.parentNode.parentNode.children[0]);

      target.style.display = "none";
      editbtn.style.display = "none";
      inputfield.style.display = "block";
      donebtn.style.display = "block";
    },
    done(event) {
      //show the input field
      var target = event.target.parentNode.parentNode.children[0];
      var donebtn = event.target.parentNode;
      var inputfield = event.target.parentNode.parentNode.children[1];
      var editbtn = event.target.parentNode.parentNode.children[2];

      target.style.display = "block";
      editbtn.style.display = "block";
      inputfield.style.display = "none";
      donebtn.style.display = "none";
    },
  },
};
</script>