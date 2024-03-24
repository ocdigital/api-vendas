<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Listar Todos os Vendedores</h2>
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
            <th class="py-4 px-6">Nome</th>
            <th class="py-4 px-6">Email</th>
            <th class="py-4 px-6">Comissão</th>
          </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
          <tr v-for="(seller, index) in sellers" :key="index" class="hover:bg-gray-100 px-6 border-b-2 border-gray-200">
            <td class="py-2">{{ seller.nome }}</td>
            <td class="py-2">{{ seller.email }}</td>
            <td class="py-2">R$   {{ seller.comissao }}</td>
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
  name: 'App',
  data() {
    return {
      sellers: []
    }
  },
  mounted() {
    this.fetchVendors();
  },
  methods: {
    fetchVendors() {
      axios.get('http://localhost:8000/api/seller')
        .then(response => {
          this.sellers = response.data.data;
        })
        .catch(error => {
          console.error('Erro ao buscar vendedores:', error);
        });
    },
  }
};
</script>
