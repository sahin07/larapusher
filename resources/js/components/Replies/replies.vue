<template>
  <v-card class="mx-auto" max-width="900" ml>
    <v-card-text>
      <div>{{ data.user }}</div>

      <p>{{ data.created_at }}</p>

      <div class="text--primary" v-if="!editmode">{{ data.reply }}</div>

      <div v-if="editmode">
        <vue-simplemde v-model="body" ref="markdownEditor" />
      </div>
    </v-card-text>

    <div v-if="isCurrentUser == data.created_by">
      <v-card-actions>
        <v-btn text color="deep-purple accent-4" @click="editReply">Edit</v-btn>
        <v-btn color="red" @click="cancelEdit">Cancel</v-btn>
      </v-card-actions>
    </div>
    <Likes :content="data"  />
  </v-card>
</template>
<script>
import Likes from './Likes'
export default {
  props: ["data"],
  components:{Likes},
  data: () => ({
    editmode: false,
    body: ""
  }),
  computed: {
    isCurrentUser() {
      return this.$store.state.UserId;
    }
  },
  methods: {
    editReply() {
      (this.editmode = true), (this.body = this.data.reply);
    },
    cancelEdit() {
      this.editmode = false;
    }
  }
};
</script>
