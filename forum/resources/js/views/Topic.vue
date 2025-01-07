<template>
    <div>
      <h1>{{ topic.title }}</h1>
      <p>{{ topic.body }}</p>
      <hr />
      <h2>Respostas</h2>
      <ul>
        <li v-for="reply in topic.replies" :key="reply.id">{{ reply.body }}</li>
      </ul>
    </div>
</template>
  
<script>
  export default {
    data() {
      return {
        topic: null,
      };
    },
    async created() {
      const response = await fetch(`/api/topics/${this.$route.params.id}`);
      this.topic = await response.json();
    },
  };
</script>
  