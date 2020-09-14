<template>
  <div class="container">
    <error-list />

    <div class="form-group row">
      <label for="IM_no" class="col-form-label text-md-right">IM No.</label>
      <input id="IM_no" type="text" class="form-control" name="IM_no" v-model="user.IM_no" />
    </div>
    <div class="form-group row">
      <label for="name" class="col-form-label text-md-right">Name</label>
      <input id="name" type="text" class="form-control" name="name" v-model="user.name" />
    </div>
    <div class="form-group row">
      <label for="dob" class="col-form-label text-md-right">Date of Birth</label>
      <input type="date" class="form-control" name="dob" v-model="user.dob" />
    </div>
    <div class="form-group row">
      <label for="phone" class="col-form-label text-md-right">Phone</label>
      <input id="phone" type="text" class="form-control" name="phone" v-model="user.phone" />
    </div>
    <div class="form-group row">
      <label for="email" class="col-form-label text-md-right">E-Mail Address</label>
      <input id="email" type="email" class="form-control" name="email" v-model="user.email" />
    </div>
    <div class="form-group row">
      <label for="password" class="col-form-label text-md-right">Password</label>
      <input
        id="password"
        type="password"
        class="form-control"
        name="password"
        v-model="user.password"
      />
    </div>
    <div class="form-group row">
      <label for="password-confirm" class="col-form-label text-md-right">Confirm Password</label>
      <input
        id="password-confirm"
        type="password"
        class="form-control"
        name="password_confirmation"
        v-model="user.password_confirmation"
      />
    </div>
    <div class="form-group row">
      <label for="gender" class="col-form-label text-md-right">Gender</label>
      <br />
      <label>
        <input id="male" type="radio" name="gender" value="male" v-model="user.gender" />
        Male
      </label>
      <label>
        <input id="female" type="radio" name="gender" value="female" v-model="user.gender" />
        Female
      </label>
    </div>
    <div class="form-group row">
      <label for="designation" class="col-form-label text-md-right">Designation</label>
      <input
        id="designation"
        type="text"
        class="form-control"
        name="designation"
        v-model="user.designation"
      />
    </div>
    <div class="form-group row">
      <label for="classification" class="col-form-label text-md-right">Classification</label>
      <input
        id="classification"
        type="text"
        class="form-control"
        name="classification"
        v-model="user.classification"
      />
    </div>
    <div class="form-group row">
      <label for="company" class="col-form-label text-md-right">Company</label>
      <input id="company" type="text" class="form-control" name="company" v-model="user.company" />
    </div>
    <div class="form-group row">
      <label for="blood_group" class="col-form-label text-md-right">Blood Group</label>
      <input
        id="blood_group"
        type="text"
        class="form-control"
        name="blood_group"
        v-model="user.blood_group"
      />
    </div>
    <button type="submit" class="btn btn-primary" @click="register">Register</button>
  </div>
</template>
<script>
export default {
  data: () => ({
    user: {
      IM_no: "",
      name: "",
      dob: "",
      phone: "",
      email: "",
      password: "",
      password_confirmation: "",
      gender: "",
      designation: "",
      classification: "",
      company: "",
      blood_group: "",
    },
  }),
  methods: {
    register() {
      this.$store.dispatch("currentUser/registerUser", this.user);
    },
  },
};
</script>