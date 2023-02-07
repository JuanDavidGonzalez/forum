<template>
    <div class="card">
        <div class="card-header text-bg-success">Responses</div>

        <div class="card-body">
            <table class='table table-striped table-bordered'>
                <tbody>
                    <tr v-for = "response in responses.data">
                        <td><b>{{response.username}}</b></td>
                        <td><p>{{response.response_text}}</p></td>
                        <td>
                            <img v-if="response.image" :src="response.image" 
                            class='img-fluid rounded mx-auto d-block' alt='response_image'>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <Bootstrap5Pagination :data="responses" @pagination-change-page="getResponses" align="right"/>
        </div>
    </div>
</template>

<script>
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

    export default {
        components: {
            Bootstrap5Pagination,
        
        },
        data() {
            return {
                post_id: 21,
                responses: {},
            }
        },
        mounted() {
            this.getResponses()
        },
        methods: {
            getResponses: function (page= 1) {
                axios.get(`/post/get_responses/${this.post_id}?page=${page}`).then(response => {
                    this.responses = response.data;
                }).catch(e => {
                    console.log(e);
                });
            },
        },
    }
</script>