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
            <td class="py-2">R$ {{ seller.totalCommission }}</td>
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
    async fetchSellers() {
      const index = client.initIndex('sellers');
      try {
        const { hits } = await index.search('');
        for (const seller of hits) {
          const salesIndex = client.initIndex('sales');
          const { hits: sales } = await salesIndex.search(seller.objectID);
          let totalCommission = 0;
          for (const sale of sales) {
            totalCommission += sale.commission;
          }
          seller.totalCommission = totalCommission;
          seller.sales = sales;
        }
        this.sellers = hits;
        if (hits.length === 0) {
          notify({
            width: 400,
            type: "error",
            title: "Nenhum vendedor encontrado!"
          });
        }
      } catch (error) {
        console.error('Erro ao buscar vendedores:', error);
        notify({
          width: 400,
          type: "error",
          title: "Erro ao buscar vendedores!"
        });
      }
    }
  }
};
</script>
