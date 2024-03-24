<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-full">
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
            <td class="py-2">{{ seller.name }}</td>
            <td class="py-2">{{ seller.email }}</td>
            <td class="py-2">R$ {{ seller.objectID }}</td>
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
  name: 'App',
  data() {
    return {
      sellers: []
    }
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
  }
};
</script>
