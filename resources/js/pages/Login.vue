<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <div class="alert alert-danger" v-if="errors.length">
              <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
              </ul>
            </div>
            <form id="register_form" method="POST" v-on:submit.prevent="onSubmit">
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" v-model="email" />
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input type="password" class="form-control" name="password" v-model="password" />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "login",
  props: ["app"],
  data() {
    return {
      email: "",
      password: "",
      errors: [],
    };
  },
  methods: {
    onSubmit() {
      this.errors = [];

      if (!this.email) {
        this.errors.push("Email is required");
      }
      if (!this.password) {
        this.errors.push("Password is required");
      }
      if (!this.errors.length) {
        const data = {
          email: this.email,
          password: this.password,
        };
        this.app.req
          .post("login", data)
          .then((response) => {
            this.app.user = response.data;
            this.$router.push("/");
            console.log(response);
            window.location.reload();
          })
          .catch((error) => {
            if (error.response) {
              this.errors.push("Could not log you in.");
              console.log(error.response.data.errors);
            }
          });
      }
    },
  },
};
</script>