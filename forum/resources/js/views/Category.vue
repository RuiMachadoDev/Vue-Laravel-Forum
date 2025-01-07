<template>
  <div>
    <h1>{{ category.name }}</h1>
    <p>{{ category.description }}</p>

    <h2>Tópicos</h2>
    <ul>
      <li v-for="topic in category.topics" :key="topic.id">
        <strong>{{ topic.title }}</strong> - criado por {{ topic.user.name }}
      </li>
    </ul>

    <button @click="showNewTopicForm = true">Novo Tópico</button>

    <div v-if="showNewTopicForm">
      <h3>Criar Novo Tópico</h3>
      <form @submit.prevent="createTopic">
        <input v-model="newTopic.title" placeholder="Título" required />
        <textarea v-model="newTopic.body" placeholder="Descrição" required></textarea>
        <button type="submit">Salvar</button>
      </form>
    </div>
  </div>
</template>

<script>
    import axios from 'axios';

    export default {
    data() {
        return {
        category: {},
        showNewTopicForm: false,
        newTopic: {
            title: '',
            body: '',
        },
        };
    },
    async created() {
        try {
        const response = await axios.get(`/categories/${this.$route.params.id}`);
        this.category = response.data;
        } catch (error) {
        console.error('Erro ao carregar categoria:', error);
        }
    },
    methods: {
        async createTopic() {
        try {
            const response = await axios.post('/topics', {
            ...this.newTopic,
            category_id: this.category.id,
            });
            this.category.topics.push(response.data);
            this.newTopic.title = '';
            this.newTopic.body = '';
            this.showNewTopicForm = false;
        } catch (error) {
            console.error('Erro ao criar tópico:', error);
        }
        },
    },
    };
</script>

<style>
/* Estilos opcionais */
</style>
