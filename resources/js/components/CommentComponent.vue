<template>
    <div class="comment-section">
        <div class="place-comment">
            <b-input-group>
                <b-form-input v-model="comment" id="comment" placeholder="Place a comment">
                </b-form-input>
                <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" v-on:click="placeComment">Submit </button>
                </span>
            </b-input-group>
        </div>

        <div class="view-comments">
            <div class="single-comment" v-for="comment in this.comments">
                <table>
                    <thead>
                        {{comment.user.name}} :
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" v-on:click="deleteComment(comment)"
                                v-if=" checkVisibility(comment)"
                            >Delete </button>
                        </span>
                    </thead>
                    <td>
                        {{comment.comment}}
                    </td>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "CommentComponent",

        data() {
            return {
                comment: '',
                comments: Array
            }
        },

        methods: {
            placeComment(){
                axios.post(this.postCommentRoute, {'user_id':this.user.id, 'image_id':this.imageId, 'comment':this.comment} )
                    .then(data=>{
                        this.comment='';
                        this.loadComments();
                    })
            },

            loadComments(){
                axios.get(this.viewCommentRoute)
                    .then (result=>{this.comments = result.data.comments})
            },

            deleteComment(commentToDelete){
                axios.delete(this.deleteCommentRoute, {data: {'comment_id':commentToDelete.id}})
                    .then(data=>{
                        this.loadComments()
                    })
            },

            checkVisibility(commentToCheck){
                return commentToCheck.user.id === this.user.id ||
                    (this.user.roles && (this.user.roles.includes('ROLE_OFFICER') ||
                    this.user.roles.includes('ROLE_GM')));
            }
        },

        mounted(){
            this.loadComments();
        },

        props: {
            user:{},
            imageId: '',
            commentToDelete: '',
            postCommentRoute: '',
            viewCommentRoute: '',
            deleteCommentRoute: '',
        }
    }



</script>

<style scoped>

</style>
