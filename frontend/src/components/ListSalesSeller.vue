<!-- ListSales.vue -->
<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Listar Todas as Vendas de um Vendedor</h2>
      <form @submit.prevent="listSales" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
          <select id="seller" v-model="vendorId" class="py-2">
            <option disabled value="">Selecione o vendedor</option>
            <option v-for="seller in sellers" :key="seller.id" :value="seller.id">
              {{ seller.name }}
            </option>
          </select>
        </div>
      </form>
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
            <th class="py-4 px-6">Data</th>
            <th class="py-4 px-6">Valor</th>
            <th class="py-4 px-6">Comissão</th>

          </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
          <tr v-for="(seller, index) in sellers" :key="index" class="hover:bg-gray-100 px-6 border-b-2 border-gray-200">
            <td class="py-2">{{ seller.nome }}</td>
            <td class="py-2">{{ seller.email }}</td>
            <td class="py-2">{{ seller.email }}</td>
          </tr>
        </tbody>
      </table>
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
      sales: [],
      sellers: [
        { id: 1, name: 'Vendedor 1' },
        { id: 2, name: 'Vendedor 2' },
        { id: 3, name: 'Vendedor 3' }
      ]
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
