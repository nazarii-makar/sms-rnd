<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <vue-dropzone
                        ref="imageUploader"
                        id="image-uploader"
                        :options="dropzoneOptions"
                        :duplicateCheck="true"
                        :includeStyling="true"
                        @vdropzone-removed-file="onRemove"
                ></vue-dropzone>
            </div>
        </div>
    </div>
</template>

<script>

    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone
        },
        methods: {
            onRemove: (file) => {
                axios.delete(`/images/${file.model.id}`)
                    .then(res => {

                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        },
        data: function () {
            return {
                dropzoneOptions: {
                    url: '/images',
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                    timeout: 14400000,
                    parallelUploads: 10,
                    maxFilesize: 10240,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true,
                    success: function (file, response) {
                        file.model = response;
                    },
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
