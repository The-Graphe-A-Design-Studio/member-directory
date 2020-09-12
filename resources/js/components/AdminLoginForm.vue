<template>
    <div>
        <p>Admin Email</p>
        <input type="email" name="email" v-model="admin.email" class="form-control mb-2">
        <p>Admin Password</p>
        <input type="password" name="password" v-model="admin.password" class="form-control mb-2">
        <button type="submit" class="btn btn-primary" @click="login">Submit</button>
    </div>
</template>
<script>
    export default {
        data: () => ({
            admin: {
                email: "",
                password: "",
            }
        }),
        methods: {
            login() {
                this.$store.dispatch('currentAdmin/loginAdmin', this.admin);
            }
        }
    }
</script>