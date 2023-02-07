<template>
    <div class='alert alert-success' role='alert' v-show="res_created">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        Response created!
    </div>
    <form class="bg-light mb-3 p-3" @submit.prevent="createResponse">
        <div class="row mb-2">
            <div class="col-md-10">
                <textarea type="text" class="form-control" :class="[errors.response_text? 'is-invalid':'']"
                            name="response" v-model="response" rows="2"
                            placeholder="Write a response...">
                </textarea>
                <span v-if="errors.response_text" class="invalid-feedback">
                    {{ errors.response_text[0] }}
                </span>
            </div>
            <div class="col-md-1 mt-4">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <input class="form-control"  type="file"  :class="[errors.image? 'is-invalid':'']"
                    ref="file" @change="loadImage" accept="image/png, image/gif, image/jpeg"/>
                <span v-if="errors.image" class="invalid-feedback">
                    {{ errors.image[0] }}
                </span>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: {
            post_id: {type: String},
        },
        data() {
            return {
                response: "",
                resp_image: "",
                errors: {},
                res_created:false,
            }
        },
        methods: {
            createResponse: function () {
                this.res_created = false;
                let formData = new FormData();
                formData.append('image', this.resp_image);
                formData.append('response_text', this.response);

                axios.post(`/post/response/${this.post_id}`, formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                        this.errors = {};
                        this.response = "";
                        this.resp_image = "";
                        this.$refs.file.value = null;
                        this.res_created = true;
                        this.$emit("reloadResponses")
                }).catch(errors => {
                    this.errors = errors.response.data.errors;
                    if(this.errors.image){
                        this.$refs.file.value = null; 
                        this.resp_image = "";
                    }

                });
            },

            loadImage(e) {
                this.resp_image = this.$refs.file.files[0];;
            }
        },
    }
</script>