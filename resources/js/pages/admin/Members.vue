<template>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Designation</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>Contact</td>
                    <td>Designation</td>
                    <td>Company</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default{
    name: 'members',
    data() {
        return{
            members: [],
        }
    },
    mounted() {
        // this.getmembers();
        axios.get(BASE_URL + '/users/details').then((response) => {
                console.log(response);
            });
    },
    methods:{
        getmembers() {
            this.app.req.get('/users/details').then((response) => {
                console.log(response);
            })
        }
    }
}
</script>