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
            <td class="py-2">{{ sale.data_da_venda }}</td>
            <td class="py-2">{{ sale.valor_da_venda }}</td>
            <td class="py-2">{{ sale.comissao }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { notify } from "@kyvg/vue3-notification";

let config = {
  method: 'get',
  maxBodyLength: Infinity,
  url: 'https://XZML7B8NSQ-dsn.algolia.net/1/indexes/sellers',
  headers: { 
    'X-Algolia-API-Key': 'c2afaffbdc4a847564e263d0d37bd5cf', 
    'X-Algolia-Application-Id': 'XZML7B8NSQ'
  }
};

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
    axios.request(config)
      .then((response) => {
        // Defina this.sellers com os dados retornados
        this.sellers = response.data.hits;
        console.log(this.sellers);
      })
      .catch((error) => {
        // Trate o erro
        notify({
          width: 400,
          type: "error",
          title: "Erro ao buscar vendedores!"
        });
        console.log(error);
      });
  },
    async searchBySeller() {
      if (this.selectedSellerId) {
        axios.get(`http://localhost:8000/api/sale/${this.selectedSellerId}`)
          .then(response => {
            this.sales = response.data.data;
          })
          .catch(error => {
            notify({
              width: 400,
              type: "error",
              title: "Erro ao buscar vendas!"
            });
          });
      }
    }
  }
};
</script>
