<template>
    <div class="post-preview">

        <a v-bind:href="slug">
            <h2 class="post-title">

                {{ title }}

            </h2>
            <h3 class="post-subtitle">
                {{ subtitle }}
            </h3>
        </a>

        <p class="post-meta">Posted by <a href="#">Bernard Chisumo</a> {{ created_at }}

            <a href=""  @clik.prevent="likeIt">

                <small>{{ likeCount }}</small>

                <i class="fa fa-thumbs-up" v-if="likeCount == 0" aria-hidden="true"></i>
                <i class="fa fa-thumbs-up" style="color: red" v-else="likesCount  > 0 " aria-hidden="true"></i>
            </a>
        </p>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                likeCount:0
            }
        },

       props : [
           'title','subtitle','created_at', 'postId','login', 'likes','slug'
       ],

        created(){

            this.likeCount = this.likes
        },

        method: {

            likeIt(){
                if(this.login){

                    axios.post('/saveLike', {
                        id : this.postId
                    })


                        .then(response => {
                            //increament the likeCount
                            if(response.data == 'deleted'){
                                this.likeCount -=1;
                            }else {
                                this.likeCount +=1;
                            }
                           // this.likeCount +=1;
                        //this.blog = response.data.data
                        //console.log(response);
                    })

                        .catch(function (error) {
                            console.log(error);
                        });
                }else {
                    window.location ='login'
                }
            }
        }
    }
</script>
