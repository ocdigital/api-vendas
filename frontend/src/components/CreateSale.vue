<!-- CreateSale.vue -->
<template>
  <div>
    <h2>Lançar Nova Venda</h2>
    <form @submit.prevent="createSale">
      <label for="vendorId">ID do Vendedor:</label>
      <input type="text" id="vendorId" v-model="vendorId">
      <label for="amount">Valor da Venda:</label>
      <input type="number" id="amount" v-model="amount">
      <button type="submit">Lançar Venda</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vendorId: '',
      amount: ''
    };
  },
  methods: {
    async createSale() {
      // Aqui você iria chamar a função para enviar os dados para a API criar a venda
      console.log('Criar venda com ID do Vendedor:', this.vendorId, 'e valor:', this.amount);
    }
  }
};
</script>
