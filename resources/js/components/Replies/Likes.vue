<template>
    <div>
    <v-btn class="ma-2" text icon color="blue lighten-2" v-if="!is_liked" @click="countLikes">
        <v-icon>mdi-thumb-up</v-icon> {{ count }}
      </v-btn>

      <v-btn class="ma-2" v-if="is_liked" text icon color="red lighten-2">
        <v-icon>mdi-thumb-down</v-icon> {{ count }}
      </v-btn>
    </div>
</template>

<script>
export default {
    props:['content'],
    data(){
        return {
            count:this.content.likes_count,
            is_liked:this.content.is_liked
        }
    },
    created(){
        Echo.channel('LikeChannel')
        .listen('LikeEvent', (e) => {
           console.log(e);
           // console.log(this.content);
           if( e.type == this.content.id){
                e.id == 1 ? this.count++ : this.count--;
           }

        });
    },
    methods: {
        countLikes(){
            this.is_liked?this.dicrement():this.increment();
            this.is_liked = !this.is_liked
        },
        dicrement(){
            this.count--;

        },
         increment(){
            this.count++;
            axios.post(`/api/${this.content.id}/like`,'',{headers:{
                        Authorization:`Bearer ${localStorage.getItem('token')}`
                    }})
            .then((res)=>{
              // EventBus.$emit("reRenderQuestion");
            }).catch((err)=>{

            })
        }
    },

}
</script>
