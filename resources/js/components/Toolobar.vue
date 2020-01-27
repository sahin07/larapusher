<template>
  <v-card
    color="blue "
    flat
    tile
  >
    <v-toolbar color="blue">
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

      <v-toolbar-title>LaraPusher</v-toolbar-title>

      <v-spacer></v-spacer>

    <div class="hidden-sm-and-down">
        <a style="display:inline-block" v-if="isLoggedIn"><app-notification></app-notification></a>
         <router-link  to="/forum">
             <v-btn text>Forum</v-btn>
        </router-link>

        <router-link  v-for="item in items"
         :key="item.title"
         :to="item.to"
         v-if="isLoggedIn"
         >
            <v-btn text>
                 {{ item.name }}
            </v-btn>
        </router-link>
        <router-link  v-if="!isLoggedIn" to="/login">
             <v-btn text>Login</v-btn>
        </router-link>

    </div>
    </v-toolbar>
  </v-card>
</template>

<script>
import AppNotification from './AppNotifiation';
export default {
    components:{AppNotification},
    data:()=>({
        items:[
            {name:"Question",to:'/question'},
            {name:"Category",to:'/category'},
            {name:"Logout",to:'/logout'},
        ]
    }),
    created(){
      EventBus.$on('logout',()=>{
                User.logOut();
            });
    },
    computed: {
        isLoggedIn(){
            return  this.$store.state.isLoggedIn
        }
    },
}
</script>
