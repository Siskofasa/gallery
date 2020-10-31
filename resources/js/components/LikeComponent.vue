
<template>
    <div>
        Likes: {{ this.likeCount}}

        <button type="button" class="btn btn-primary" v-on:click="like"> {{ this.likeExists ?'Unlike':'Like' }} </button>
    </div>

</template>

<script>
    export default {
        name: "LikeComponent",

        data() {
            return {
                likeCount: 0,
                likeExists: false
            }
        },

        methods: {
            like(){

                axios.post(this.likeRoute, {'user_id':this.userId, 'image_id':this.imageId})
                    .then(result=>{
                        this.likeCount = result.data.like_count;
                        this.likeExists = result.data.current_user;
                    })
            }
        },

        mounted(){
            this.likeCount =  this.tempLikeCount;
            this.likeExists = this.tempLikeExists;
        },

        props: {
            userId:'',
            imageId: '',
            likeRoute: '',
            tempLikeCount: 0,
            tempLikeExists: false
        },
    }
</script>

<style scoped>

</style>
