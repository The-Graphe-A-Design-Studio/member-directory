<template>
    <div class="panel bg-dark shadow-sm" id="sidebar">
    <ul class="text-white p-0 m-0">
        <li class="side-link"><router-link to="/members">Members</router-link></li>
        <li class="side-link"><router-link to="/">Office Bearers</router-link></li>
        <li class="side-link"><router-link to="/">Circulars/Newsletters</router-link></li>
        <li class="side-link"><router-link to="/">Events and activities</router-link></li>
        <li class="side-link"><router-link to="/">Birthdays/Anniversaries</router-link></li>
        <li class="side-link"><router-link to="/">Gallery</router-link></li>
    </ul>
    </div>
</template>
<script>
export default {
    name: "adminsidebar",
    data() {
        return {}
    }
}
</script>
<style scoped>
    #sidebar{
        width:20%;
        height:100vh;
    }
    .side-link{
        list-style: none;
        padding: 1rem;
    }
    .side-link *{
        color:white;
        text-decoration: none;
        font-size: 1.35rem;
    }
</style>