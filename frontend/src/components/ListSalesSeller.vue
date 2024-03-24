<!-- ListSales.vue -->
<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Listar Todas as Vendas de um Vendedor</h2>
      <form @submit.prevent="listSales" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
          <select id="seller" v-model="selectedSellerId" class="py-2" @change="searchBySeller(selectedSellerId)">
            <option disabled value="">Selecione o vendedor</option>
            <option v-for="seller in sellers" :key="seller.id" :value="seller.id">
              {{ seller.nome }}
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
    <div class="w-2/4 mt-4">
      <img src="../assets/5704293.jpg" alt="" class="w-3/4 h-auto ">
    </div>
  </div>
</template>

<script>
import axios from 'axios';

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
      axios.get('http://localhost:8000/api/seller')
        .then(response => {
          this.sellers = response.data.data;
        })
        .catch(error => {
          console.error('Erro ao buscar vendedores:', error);
        });
    },
    async searchBySeller() {
      console.log('vamos buscar pelo id do vendedor:', this.selectedSellerId);
  
      // Buscar vendas do vendedor selecionado
      if (this.selectedSellerId) {
        axios.get(`http://localhost:8000/api/sale/${this.selectedSellerId}`)
          .then(response => {
            console.log('Vendas do vendedor:', response.data.data);
            this.sales = response.data.data;
            // Aqui você pode fazer algo com os dados das vendas, como exibir em uma tabela
          })
          .catch(error => {
            console.error('Erro ao buscar vendas do vendedor:', error);
          });
      }
    }
  }
};
</script>
