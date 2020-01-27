<template>

  <v-form @submit.prevent="login">
    <v-container>
      <v-row>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.email"
            label="E-mail"
            required
          ></v-text-field>
        </v-col>

         <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.password"
            label="Password"
            required
          ></v-text-field>
        </v-col>

      </v-row>
      <v-btn
        color="green"
        type="submit"
      >
       Login
      </v-btn>
      <router-link to="/signup">
        <v-btn
        color="orange"
        type="button"
      >
       Sign Up
      </v-btn>
      </router-link>
<div color="red" v-if="!form.valid">Wrong Email and Password</div>
    </v-container>
  </v-form>
</template>

<script>
export default {

    data:()=>(
        {
        form:{
            email:null,
            password:null,
            valid:true
        }
    }
    ),
    created(){

    },
    methods:{
       login(){

            User.login(this.form)
            .then((res)=>{
                 this.$store.dispatch('login',res);
                  this.$router.push({ path: '/forum' })
            }).catch((err)=>{
                this.form.valid = err.response.errors
            });
       }
    }

}
</script>
