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
          <button type="submit" class="bg-custom-orange text-white px-4 py-2 rounded-md">Criar Vendedor</button>
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

export default {
  data() {
    return {
      name: '',
      email: ''
    };
  },
  methods: {
    async createSeller() {
      console.log('Criar vendedor com nome:', this.name, 'e email:', this.email);
      // Verifica se os campos obrigatórios estão preenchidos
      if (!this.name || !this.email) {
        console.error('Por favor, preencha todos os campos.');
        return;
      }

      // Cria um objeto com os dados do novo vendedor
      const newSeller = {
        name: this.name,
        email: this.email
      };

      console.log('Dados do novo vendedor:', newSeller);

      // Envia os dados para o servidor criar o vendedor
      axios.post('http://localhost:8000/api/seller', newSeller)
        .then(response => {
          console.log('Vendedor criado com sucesso:', response.data);
          // Aqui você pode fazer algo com a resposta, como redirecionar para uma página de confirmação
        })
        .catch(error => {
          console.error('Erro ao criar vendedor:', error);
        });
    }
  }
};
</script>