<!-- App.vue -->
<template>
  <div id="app">
    <nav class="bg-slate-600 p-3">
      <router-link to="/create-seller" class="text-white mr-4">Criar Vendedor</router-link>
      <router-link to="/list-sellers" class="text-white mr-4">Listar Vendedores</router-link>
      <router-link to="/create-sale" class="text-white mr-4">Criar Venda</router-link>
      <router-link to="/list-sales-seller" class="text-white">Listar Vendas do Vendedor</router-link>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App'
};
</script>

