<template>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="cs-p-1">Name</th>
                <th class="cs-p-1"></th>
                <th class="cs-p-1">Status</th>
                <th class="cs-p-1">Delete</th>
            </tr>
            </thead>
            <tr v-for="image in this.images">
                <td class="cs-p-1"><a :href="imageLink.slice(0, -1) + image.id">{{ image.image_title }}</a></td>
                <td class="cs-p-1"></td>
                <td class="cs-p-1">
                    <toggle-button :value="image.is_visible === 1"
                                   color="#82C7EB"
                                   @change="updateVisibility(image)"
                                   :sync="false"
                                   :labels="true"/>
                </td>
                <td class="cs-p-1"><button type="button" class="btn btn-secondary" v-on:click="deleteImage(image)"> Delete </button></td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ManageComponent",

        data()  {
          return {
              images : Array,
          }
        },

        props: {
            tempImages : Array,
            imageLink : '',
            updateVisibilityRoute: '',
            deleteImageRoute: ''
        },

        methods: {
            updateVisibility(image){
                axios.post(this.updateVisibilityRoute, {'image_id':image.id})
                    .then(result=>{
                    })
            },

            deleteImage(image){
                axios.delete(this.deleteImageRoute, {data: {'image_id':image.id}})
                    .then(result=>{
                        this.images = result.data.images
                    })
            }
        },

        mounted() {
            this.images = this.tempImages
        }

    }
</script>

<style scoped>

</style>
