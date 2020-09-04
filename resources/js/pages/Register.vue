<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <div class="alert alert-danger" v-if="errors.length">
              <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
              </ul>
            </div>
            <form
              id="register_form"
              method="POST"
              enctype="multipart/form-data"
              v-on:submit.prevent="onSubmit"
            >
              <div class="form-group row">
                <label for="IM_no" class="col-md-4 col-form-label text-md-right">IM No.</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="IM_no" v-model="IM_no" />
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" v-model="name" />
                </div>
              </div>

              <div class="form-group row">
                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                <div class="col-md-6">
                  <input type="date" class="form-control" name="dob" v-model="dob" />
                </div>
              </div>

              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="phone" v-model="phone" />
                </div>
              </div>

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

              <div class="form-group row">
                <label
                  for="password-confirm"
                  class="col-md-4 col-form-label text-md-right"
                >Confirm Password</label>

                <div class="col-md-6">
                  <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    v-model="password_confirmation"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                <div class="col-md-6">
                  <label>
                    <input id="male" type="radio" name="gender" value="male" v-model="gender" />
                    Male
                  </label>
                  <label>
                    <input id="female" type="radio" name="gender" value="female" v-model="gender" />
                    Female
                  </label>
                </div>
              </div>

              <div class="form-group row">
                <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>

                <div class="col-md-6">
                  <input
                    id="fileChooser"
                    type="file"
                    name="photo"
                    ref="file"
                    class="form-control"
                    @change="fileUpload($event)"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="designation" v-model="designation" />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="classification"
                  class="col-md-4 col-form-label text-md-right"
                >Classification</label>

                <div class="col-md-6">
                  <input
                    type="text"
                    class="form-control"
                    name="classification"
                    v-model="classification"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="company" class="col-md-4 col-form-label text-md-right">Company</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="company" v-model="company" />
                </div>
              </div>

              <div class="form-group row">
                <label for="blood_group" class="col-md-4 col-form-label text-md-right">Blood Group</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="blood_group" v-model="blood_group" />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">Register</button>
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
  name: "register",
  props: ["app"],
  data() {
    return {
      IM_no: "",
      name: "",
      dob: "",
      email: "",
      phone: "",
      password: "",
      password_confirmation: "",
      gender: "",
      photo: "",
      designation: "",
      classification: "",
      company: "",
      blood_group: "",
      errors: [],
    };
  },
  methods: {
    onSubmit() {
      this.errors = [];
      var fuData = document.getElementById("fileChooser");
      var FileUploadPath = fuData.value;
      //To check if user upload any file
      if (FileUploadPath == "") {
        this.errors.push("Please upload an image file");
      } else {
        var Extension = FileUploadPath.substring(
          FileUploadPath.lastIndexOf(".") + 1
        ).toLowerCase();

        //The file uploaded is an image

        if (
          Extension == "gif" ||
          Extension == "png" ||
          Extension == "bmp" ||
          Extension == "jpeg" ||
          Extension == "jpg"
        ) {
          // To Display
          if (fuData.files && fuData.files[0]) {
            var reader = new FileReader();

            // reader.onload = function (e) {
            //   $("#blah").attr("src", e.target.result);
            // };
            reader.readAsDataURL(fuData.files[0]);
            this.photo = fuData.files[0];
          }
        }

        //The file upload is NOT an image
        else {
          this.photo = "";
          this.errors.push("Only images are allowed");
        }
      }
      if (!this.IM_no) {
        this.errors.push("IM No. is required");
      }
      if (!this.name) {
        this.errors.push("Name is required");
      }
      if (!this.dob) {
        this.errors.push("Date of birth is required");
      }
      if (!this.phone) {
        this.errors.push("Phone is required");
      }
      if (!this.email) {
        this.errors.push("Email is required");
      }
      if (!this.password) {
        this.errors.push("Password is required");
      }
      if (!this.password_confirmation) {
        this.errors.push("Please confirm your password");
      }
      if (this.password != this.password_confirmation) {
        this.errors.push("Passwords do not match");
      }
      if (!this.gender) {
        this.errors.push("Gender is required");
      }
      if (!this.designation) {
        this.errors.push("Designation is required");
      }
      if (!this.classification) {
        this.errors.push("Classification is required");
      }
      if (!this.company) {
        this.errors.push("Company is required");
      }
      if (!this.blood_group) {
        this.errors.push("Blood Group is required");
      }
      if (!this.errors.length) {
        // const data = {
        //   IM_no: this.IM_no,
        //   name: this.name,
        //   dob: this.dob,
        //   email: this.email,
        //   phone: this.phone,
        //   password: this.password,
        //   password_confirmation: this.password_confirmation,
        //   gender: this.gender,
        //   photo: this.photo,
        //   designation: this.designation,
        //   classification: this.classification,
        //   company: this.company,
        //   blood_group: this.blood_group,
        // };
        let formData = new FormData();
        formData.append("IM_no", this.IM_no);
        formData.append("name", this.name);
        formData.append("dob", this.dob);
        formData.append("email", this.email);
        formData.append("phone", this.phone);
        formData.append("password", this.password);
        formData.append("password_confirmation", this.password_confirmation);
        formData.append("gender", this.gender);
        formData.append("photo", this.photo);
        formData.append("designation", this.designation);
        formData.append("classification", this.classification);
        formData.append("company", this.company);
        formData.append("blood_group", this.blood_group);
        axios
          .post("register", formData, {
            headers: {
              accept: "application/json",
              "Accept-Language": "en-US,en;q=0.8",
              "Content-Type": `multipart/form-data`,
            },
          })
          .then((response) => {
            this.app.user = response.data;
            this.$router.push("/");
            window.location.reload();
          })
          .catch((error) => {
            if (error.response) {
              var errs = [];
              var errarr = Object.values(error.response.data.errors);
              errarr.forEach(function (item, index) {
                errs.push(item[0]);
              });
              // console.log(Object.values(error.response.data.errors)[0][0]);
            }
            this.errors = errs;
          });
      }
    },
    handleFileUpload(event) {
      // var fullPath = $(this).val();
      // console.log();
      // this.photo = this.$refs.file.files[0];
      console.log("Triggered");
      this.photo = event.target.files[0];
      var errarr = [];
      var fullPath = this.photo;
      var startIndex =
        fullPath.indexOf("\\") >= 0
          ? fullPath.lastIndexOf("\\")
          : fullPath.lastIndexOf("/");
      var filename = fullPath.substring(startIndex);
      if (filename.indexOf("\\") === 0 || filename.indexOf("/") === 0) {
        filename = filename.substring(1);
      }
      var fileExt = filename.split(".").pop();

      if (
        fileExt == "jpeg" ||
        fileExt == "jpg" ||
        fileExt == "png" ||
        fileExt == "gif"
      ) {
        //pass
      } else {
        errarr.push("Photo has to be an image");
      }
      this.errors = errarr;
    },
    fileUpload(event) {},
  },
};
</script>