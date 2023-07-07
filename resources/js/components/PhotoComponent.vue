<template>

    <div id="app">
        <div class="form-group">
            <input type="file" name="images[]" id="image" multiple class="input-file" @change="fieldChange">
            <label for="image" class="btn btn-tertiary js-labelFile">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Завантажити фотографії</span>
            </label>
        </div>
        <div class="photo-previe">
            <img  v-for="(image, index) in images" :key="`image-${index}`" class="img-responsive" :src="image">
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            images: [],
            attachments: [],
        }
    },
    methods: {
        fieldChange(e) {
            let selectedFiles = e.target.files;
            for (let i = 0; i < selectedFiles.length; i++) {
                this.attachments.push(selectedFiles[i]);
            }
            for (let i = 0; i < this.attachments.length; i++) {
                var myIt = this.attachments[i];
            }
            this.createImages(myIt);
        },
        createImages(file) {
            var reader = new FileReader();
            reader.onload = (e) => {
                this.images.push(e.target.result);
            };
            reader.readAsDataURL(file);
        },
    },


}
</script>





