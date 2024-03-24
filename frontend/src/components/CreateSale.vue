<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Lançar Nova Venda</h2>
      <form @submit.prevent="createSale" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
          <label for="vendorId">ID do Vendedor:</label>
          <select id="seller" v-model="seller" class="py-2">
            <option disabled value="">Selecione o vendedor</option>
            <option v-for="seller in sellers" :key="seller.objectID" :value="seller.objectID">
              {{ seller.name }}
            </option>
          </select>
          <label for="value">Valor da Venda:</label>
          <input type="number" id="value" v-model="value" class="border-solid border-2 border-gray-400 p-2">
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
      sellers: [],
      seller: '',
      value: ''
    }
  },
  mounted() {
    this.fetchVendors();
  },
  methods: {
  fetchVendors() {
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
    async createSale() {
      if (!this.seller || !this.value) {
        notify({
          width: 400,
          type: "error",
          title: "Preencha todos os campos!"
        });
        return;
      }

      const newSale = {
        seller_id: this.seller,
        sale_value: this.value
      };

      axios.post('http://localhost:8000/api/sale', newSale)
        .then(response => {
          notify({
            width: 400,
            type: "success",
            title: "Venda criada com sucesso!"
          });
        })
        .catch(error => {
          notify({
            width: 400,
            type: "error",
            title: "Erro ao criar venda!"
          });
        });
    }
  }
};
</script>
