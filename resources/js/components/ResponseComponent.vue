<template>
    <div class="card">
        <div class="card-header text-bg-success">Responses</div>

        <div class="card-body">
            <table class='table table-striped table-bordered'>
                <tbody>
                    <tr v-for = "response in responses">
                        <td><b>{{response.username}}</b></td>
                        <td><p>{{response.response_text}}</p></td>
                        <!-- <td>
                            <img src='{{asset('storage/'.$response->image)}}' 
                            class='img-fluid rounded mx-auto d-block' alt='response_image'>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post_id: 1,
                responses: {},
            }
        },
        mounted() {
            this.getResponses()
        },
        methods: {
            getResponses: function () {
                axios.get('/post/get_responses/' + this.post_id).then(response => {
                    this.responses = response.data.data;
                }).catch(e => {
                    console.log(e);
                });
            },
        },
    }
</script>