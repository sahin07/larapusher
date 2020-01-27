<template>
  <div>
    <showQuestion
      v-if="!editMode"
      :data="question"
      v-on:startEdit="seteditMode()"
      v-on:refreshQuestion="loadQuestion()"
    />
    <editQuestion v-else="editMode" :data="question" />
  </div>
</template>
<script>
import showQuestion from "./showQuestion";
import editQuestion from "./EditQuestion";
export default {
  components: { showQuestion, editQuestion },
  data: () => ({
    question: {},
    editMode: false
  }),
  created() {
    this.renderQuestion();
     EventBus.$on('reRenderQuestion',()=>{
           this.renderQuestion();
      })
  },
  methods: {
    renderQuestion() {
      axios
        .get(`/api/question/${this.$route.params.slug}`,{headers:{
                        Authorization:`Bearer ${localStorage.getItem('token')}`
                    }})
        .then(res => {
          this.question = res.data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    seteditMode() {
      this.editMode = true;
    },
    loadQuestion() {
      this.renderQuestion();

    },

  }
};
</script>
