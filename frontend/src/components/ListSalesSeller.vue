<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-full">
      <h2 class="text-2xl py-3">Listar Todas as Vendas de um Vendedor</h2>
      <form @submit.prevent="listSales" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
          <select id="seller" v-model="selectedSellerId" class="py-2" @change="searchBySeller(selectedSellerId)">
            <option disabled value="">Selecione o vendedor</option>
            <option v-for="seller in sellers" :key="seller.objectID" :value="seller.objectID">
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
          <tr v-for="(sale, index) in sales" :key="index" class="hover:bg-gray-100 px-6 border-b-2 border-gray-200">
            <td class="py-2">{{ sale.created_at }}</td>
            <td class="py-2">{{ sale.sale_value }}</td>
            <td class="py-2">{{ sale.commission }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { notify } from "@kyvg/vue3-notification";

const algoliasearch = require('algoliasearch');
const client = algoliasearch('XZML7B8NSQ', 'c2afaffbdc4a847564e263d0d37bd5cf');

export default {
  data() {
    return {
      name: '',
      email: '',
      selectedSellerId: null,
      sellers: [],
      sales: []
    };
  },
  mounted() {
    this.fetchSellers();
  },
  methods: {
   fetchSellers() {
    const index = client.initIndex('sellers');
    index.search('').then(({ hits }) => {
      this.sellers = hits;
      if (hits.length === 0) {
        notify({
          width: 400,
          type: "error",
          title: "Nenhuma vendedor encontrado!"
        });
      } 
    }); 
    },
  async searchBySeller() { 
    const index = client.initIndex('sales');
    const query = this.selectedSellerId;
    index.search(query).then(({ hits }) => {
      this.sales = hits;
      if (hits.length === 0) {
        notify({
          width: 400,
          type: "error",
          title: "Nenhuma venda encontrada!"
        });
      }
    }); 
  }
}  
};
</script>
