<template>
    <form class="bg-light mb-3 p-3" @submit.prevent="createResponse">
        <div class="row mb-2">
            <div class="col-md-10">
                <textarea type="text" class="form-control" 
                            name="response" v-model="response" rows="2"
                            placeholder="Write a response...">
                </textarea>
            </div>
            <div class="col-md-1 mt-4">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <input class="form-control" type="file"  ref="file" @change="loadImage"  
                    accept="image/png, image/gif, image/jpeg"/>
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
            }
        },
        methods: {
            createResponse: function () {
                let formData = new FormData();
                formData.append('image', this.resp_image);
                formData.append('response_text', this.response);

                axios.post(`/post/response/${this.post_id}`, formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                        this.response = "";
                        this.resp_image = "";
                        this.$refs.file.value = null;
                        this.$emit("reloadResponses")
                }).catch(errors => {
                    console.log(errors);
                });
            },

            loadImage(e) {
                this.resp_image = this.$refs.file.files[0];;
            }
        },
    }
</script>