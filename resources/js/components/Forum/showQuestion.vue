<template>
  <div>
    <v-card class="mx-auto" v-if="!editMode">
      <v-card-title>{{ data.title }}</v-card-title>

      <v-card-subtitle>{{data.user}} - {{ data.created_at }}</v-card-subtitle>

      <v-card-text>{{ data.body }}</v-card-text>

      <v-spacer></v-spacer>
      <v-btn color="green">5 Replies</v-btn>
      <template v-if="currentId == data.userID">
        <v-btn color="orange" @click="edit">Edit</v-btn>
        <v-btn color="red" @click="destroy">Delete</v-btn>
      </template>
    </v-card>

    <Replies v-for="reply in data.replies" :key="reply.id" :data="reply" />
    <form @submit.prevent="createReply(token)">
      <vue-simplemde v-model="body" ref="markdownEditor" />
      <v-btn color="green" type="submit">Reply</v-btn>
    </form>
  </div>
</template>

<script>
import Replies from "./../Replies/replies";
import User from './../../Helper/User'
export default {
  components: { Replies },
  props: ["data"],
  data: () => ({
    editMode: false,
    body: ""
  }),
  created() {
        Echo.private('App.User.' + User.id(),)
        .notification((notification) => {
            console.log(notification);
           this.data.replies.unshift(notification.reply);
        });
  },
  methods: {
    destroy() {
      this.$store.commit("deleteQuestion", this.data.slug);
      setTimeout(() => {
        this.$router.push("/forum");
      }, 2000);
    },
    createReply(token) {
      axios
        .post(
          `/api/question/${this.data.slug}/reply`,
          { body: this.body },
          {
            headers: {
              Authorization: `Bearer ${token}`
            }
          }
        )
        .then(res => {
          this.body = "";
          this.$emit("refreshQuestion");
          EventBus.$emit('loadNotification');
        })
        .catch(err => {
          console.log(err);
        });

    },
    edit() {
      this.$emit("startEdit");
    }
  },
  computed: {
    currentId() {
      console.log("dfhd", this.data);
      return this.$store.state.UserId;
    },
    token() {
      return this.$store.state.token;
    }
  }
};
</script>
