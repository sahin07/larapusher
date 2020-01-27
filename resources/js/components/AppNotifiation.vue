<template>
  <div class="text-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          :color="color"
          dark
          v-on="on"
        >
          Notification ({{ unreadCount }})
        </v-btn>
      </template>
      <v-list>
        <v-list-item
            v-for="unread in unreads "
        :key="unread.id" >
          <router-link :to="unread.path">
             <v-list-item-title @click="readAt(unread.id)">{{ unread.question }}</v-list-item-title>
            </router-link>
        </v-list-item>
          <v-list-item
            v-for="read in reads "
        :key="read.id" >

             <v-list-item-title @click="readAt(read.id)">{{ read.question }}</v-list-item-title>

        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
export default {

    data(){
        return{
            reads:[],
            unreads:[],
            unreadCount:0
        }
    },
    created(){
        this.getNotification();
        EventBus.$on('loadNotification',()=>{
             this.getNotification();
        });
        Echo.private('App.User.' + User.id(),)
        .notification((notification) => {
            console.log(notification);
           this.unreads.unshift(notification);
           this.unreadCount++
        });
    },
    methods: {
        getNotification(){
        axios.get('/api/notification',
        {headers:{
            Authorization:`Bearer ${localStorage.getItem('token')}`
        }})
        .then((res)=>{
           this.reads = res.data.read;
           this.unreads = res.data.unread;
           this.unreadCount = res.data.unread.length
        }).catch((err)=>{
            console.log(err);
        })
        },
        readAt(id){
        axios.get(`/api/notification/${id}`,
        {headers:{
            Authorization:`Bearer ${localStorage.getItem('token')}`
        }})
        .then((res)=>{
          this.getNotification();
        }).catch((err)=>{
            console.log(err);
        })
        }
    },
    computed: {
        color(){
            return this.unreadCount > 0 ? 'red':'primary';
        }
    },

}
</script>
