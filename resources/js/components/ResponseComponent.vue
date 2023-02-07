<template>
    <div class="card">
        <div class="card-header text-bg-success">Responses</div>

        <div class="card-body">
            <add-response-component 
                :post_id="post_id"
                @reload-responses="getResponses">
            </add-response-component>
            <div class="row">
                <div class="col-md-12">               
                    <table class='table table-striped table-bordered table-fi' style="table-layout: fixed;" >
                        <tbody>
                            <tr v-for = "response in responses.data">
                                <td><b>{{response.username}}</b></td>
                                <td><p>{{response.response_text}}</p></td>
                                <td>
                                    <img v-if="response.image" :src="response.image" 
                                    class='img-fluid rounded mx-auto d-block' alt='response_image'
                                    style="max-width: 250px; max-height: 250px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <Bootstrap5Pagination :data="responses" @pagination-change-page="getResponses" align="right"/>
        </div>
    </div>
</template>

<script>
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import AddResponseComponent from './AddResponseComponent.vue';

    export default {
        components: {
            Bootstrap5Pagination,
            AddResponseComponent
        },
        props: {
            post_id: {type: String},
        },
        data() {
            return {
                responses: {},
                response: "",
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