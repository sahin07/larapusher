<template>
  <v-form @submit.prevent="signUp">
    <v-container>
      <v-row>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.name"
            label="name"
            required
          ></v-text-field>
           <v-alert dense type="error" v-if="errors.name" text="">
            {{ errors.name[0] }}
            </v-alert>
        </v-col>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.email"
            label="Email"
            required
          ></v-text-field>
           <v-alert dense type="error" v-if="errors.email" text>
            {{ errors.email[0] }}
            </v-alert>
        </v-col>

         <v-col
          cols="12"
            >
          <v-text-field
            v-model="form.password"
            label="Password"
            required
          ></v-text-field>
          <v-alert dense type="error" v-if="errors.password" text>
            {{ errors.password[0] }}
            </v-alert>
        </v-col>

         <v-col
          cols="12"
            >
          <v-text-field
            v-model="form.password_confirmation "
            label="Confirm Password"
            required
          ></v-text-field>
          <v-alert dense type="error" v-if="errors.password_confirmation" text>
            {{ errors.password_confirmation[0] }}
            </v-alert>
        </v-col>

      </v-row>
      <v-btn
        color="green"
        type="submit"
      >
       Sign Up
      </v-btn>
      <router-link to="/login">
        <v-btn
        color="orange"
        type="button"
      >
       Login
      </v-btn>
      </router-link>

    </v-container>
  </v-form>
</template>

<script>
export default {
    data:()=>({
        form:{
            name:null,
            email:null,
            password:null,
            password_confirmation:null
        },
        errors:{

        }
    }),
    methods:{
        signUp(){
             axios.post('/api/auth/signUp',this.form)
            .then((res) => {
                User.responseAfterLogin(res);
            })
            .catch((err) => {
                console.log(err.response);
            })

        }
    }
}
</script>
