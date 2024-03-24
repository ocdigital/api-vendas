<!-- CreateSale.vue -->
<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Lançar Nova Venda</h2>
      <form @submit.prevent="createSale" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
          <label for="vendorId">ID do Vendedor:</label>
          <input type="text" id="vendorId" v-model="vendorId" class="border-solid border-2 border-gray-400 p-2">
          <label for="amount">Valor da Venda:</label>
          <input type="number" id="amount" v-model="amount" class="border-solid border-2 border-gray-400 p-2">
        </div>
        <div class="flex justify-end mt-4">
          <button type="submit" class="bg-custom-orange text-white px-4 py-2 rounded-md">Lançar Venda</button>
        </div>
      </form>
    </div>
    <div class="w-2/4 mt-4">
      <img src="../assets/5704293.jpg" alt="" class="w-3/4 h-auto ">
    </div>
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
