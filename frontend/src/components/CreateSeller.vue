<template>
  <div class="container mx-auto flex flex-row">
    <div class="w-2/4">
      <h2 class="text-2xl py-3">Criar Vendedor</h2>
      <form @submit.prevent="createSeller" class="p-4">
        <div class="grid grid-cols-1 gap-y-4">
          <label for="name">Nome:</label>
          <input type="text" id="name" v-model="name" class="border-solid border-2 border-gray-400 p-2">
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="email" class="border-solid border-2 border-gray-400 p-2">
        </div>
        <div class="flex justify-end mt-4">
          <button type="submit" :disabled="isCreating" class="bg-custom-orange text-white px-4 py-2 rounded-md">
            {{ isCreating ? 'Aguarde estamos criando o vendedor...' : 'Criar Vendedor' }}
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

export default {
  data() {
    return {
      name: '',
      email: '',
      isCreating: false 
    };
  },
  methods: {
    async createSeller() {
      if (!this.name || !this.email) {
        notify({
          width: 400,
          type: "error",
          title: "Preencha todos os campos!"
        });
        return;
      }

      this.isCreating = true; 

      const newSeller = {
        name: this.name,
        email: this.email
      };

     axios.post('http://localhost:8000/api/seller', newSeller, {
          headers: {
            'Authorization': process.env.VUE_APP_API_TOKEN
          }
        })
        .then(response => {
          this.isCreating = false; 
          notify({
            width: 400,
            type: "success",
            title: "Vendedor criado com sucesso!"
          });
          this.name = ''; 
          this.email = '';
        })
        .catch(error => {
          this.isCreating = false; 
          console.error('Erro ao criar vendedor:', error);
          notify({
            width: 400,
            type: "error",
            title: "Erro ao criar vendedor!"
          });
        });
    }
  }
};
</script>
