<template>
  <div>
    <h1>Categorias</h1>
    <ul>
      <li v-for="category in categories" :key="category.id">
        <router-link :to="`/categories/${category.id}`">{{ category.name }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      categories: [],
    };
  },
  async created() {
    try {
      const response = await axios.get('/categories');
      this.categories = response.data;
    } catch (error) {
      console.error('Erro ao carregar categorias:', error);
    }
  },
};
</script>

<style>
/* Estilos opcionais */
</style>
