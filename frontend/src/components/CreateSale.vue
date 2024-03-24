<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Lançar Nova Venda</h2>
      <form @submit.prevent="createSale" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
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
          <button type="submit" :disabled="isCreating" class="bg-custom-orange text-white px-4 py-2 rounded-md">
            {{ isCreating ? 'Aguarde estamos lançando a venda...' : 'Lançar Venda' }}
          </button>
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

const algoliasearch = require('algoliasearch');
const client = algoliasearch('XZML7B8NSQ', 'c2afaffbdc4a847564e263d0d37bd5cf');

export default {
  name: 'App',
  data() {
    return {
      sellers: [],
      seller: '',
      value: '',
      isCreating: false 
    }
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
            title: "Nenhum vendedor encontrado!"
          });
        } 
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

      this.isCreating = true; 

      const newSale = {
        seller_id: this.seller,
        sale_value: this.value
      };

      axios.post('http://localhost:8000/api/sale', newSale)
        .then(response => {
          this.isCreating = false; 
          notify({
            width: 400,
            type: "success",
            title: "Venda criada com sucesso!"
          });
          this.seller = '';
          this.value = '';
        })
        .catch(error => {
          this.isCreating = false; 
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
