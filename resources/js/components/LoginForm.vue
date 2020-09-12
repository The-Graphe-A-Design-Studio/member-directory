<template>
    <div>
        <p>Email</p>
        <input type="email" name="email" v-model="user.email" class="form-control mb-2">
        <p>Password</p>
        <input type="password" name="password" v-model="user.password" class="form-control mb-2">
        <button type="submit" class="btn btn-primary" @click="login">Submit</button>
    </div>
</template>
<script>
    export default {
        data: () => ({
            user: {
                email: "",
                password: "",
            }
        }),
        methods: {
            login() {
                this.$store.dispatch('currentUser/loginUser', this.user);
            }
        }
    }
</script>