<template>
    <div>
      <h1>Categorias</h1>
      <ul>
        <li v-for="category in categories" :key="category.id">
          <router-link :to="'/topics/' + category.id">{{ category.name }}</router-link>
        </li>
      </ul>
    </div>
</template>
  
<script>
  export default {
    data() {
      return {
        categories: [],
      };
    },
    async created() {
      const response = await fetch('/api/categories');
      this.categories = await response.json();
    },
  };
</script>
  