<template>
  <div>
    <h2>Criar Vendedor</h2>
    <form @submit.prevent="createSeller">
      <label for="name">Nome:</label>
      <input type="text" id="name" v-model="name">
      <label for="email">Email:</label>
      <input type="email" id="email" v-model="email">
      <button type="submit">Criar Vendedor</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: ''
    };
  },
  methods: {
    async createSeller() {
      // Aqui você iria chamar a função para enviar os dados para a API criar o vendedor
      console.log('Criar vendedor com nome:', this.name, 'e email:', this.email);
    }
  }
};
</script>
