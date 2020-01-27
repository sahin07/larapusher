<template>
      <v-form @submit.prevent="update">
    <v-container>
      <v-row>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.title"
            label="Title"
            required
          ></v-text-field>
        </v-col>

         <v-col cols="12">
          <v-select
            v-model="form.category_id"
            :items="categories"
            dense
            filled
            label="Select Category"
            item-value="id"
            item-text="name"
            autocomplete
          ></v-select>
        </v-col>
 <v-col cols="12">
         <vue-simplemde  v-model="form.body" ref="markdownEditor" />
   </v-col>

      </v-row>
      <v-btn
        color="green"
        type="submit"
      >
       Craete
      </v-btn>

    </v-container>
  </v-form>
</template>

<script>
export default {
    props:['data'],
    data:()=>({
        form:{
            title:null,
            category_id:null,
            body:null,
        },
        categories:[]
    }),
    methods:{
        update(){

        }
    },
    created(){

    },
    mounted(){
         axios.get('/api/category')
        .then((res)=>{
            this.categories = res.data.data
             this.form = this.data
        })
        .catch((err)=>{
            console.log(err);
        })

    }

}
</script>
