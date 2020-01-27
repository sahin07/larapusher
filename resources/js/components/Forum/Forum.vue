<template>
  <v-container class="grey lighten-5">
    <v-row
      class="mb-6"
      no-gutters
    >
      <v-col
        cols="8"
      >
        <v-card
          class="pa-2"
          outlined
          tile
        >

         <question v-for="question in questions" :key="question.id" :data="question"></question>

        </v-card>
      </v-col>
      <v-col
        cols="4"
      >
        <v-card
          class="pa-2"
          outlined
          tile
        >
          gffg
        </v-card>
      </v-col>
    </v-row>

  </v-container>
</template>

<script>
import question from './Question'
export default {
    data:()=>(
        {
            questions:{}
        }
    ),
    components:{question},
    created(){
        axios.get('/api/question')
        .then((res)=>{
            this.questions = res.data.data
        })
        .catch((err)=>{
            console.log(err);
        })
    }

}
</script>
