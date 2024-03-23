<!-- ListSales.vue -->
<template>
  <div>
    <h2>Listar Todas as Vendas de um Vendedor</h2>
    <form @submit.prevent="listSales">
      <label for="vendorId">ID do Vendedor:</label>
      <input type="text" id="vendorId" v-model="vendorId">
      <button type="submit">Listar Vendas</button>
    </form>
    <ul v-if="sales.length">
      <li v-for="(sale, index) in sales" :key="index">{{ sale.amount }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vendorId: '',
      sales: []
    };
  },
  methods: {
    async listSales() {
      // Aqui você iria chamar a função para enviar o ID do vendedor para a API e obter as vendas correspondentes
      console.log('Listar vendas do vendedor com ID:', this.vendorId);
    }
  }
};
</script>
