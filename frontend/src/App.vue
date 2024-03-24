<!-- App.vue -->
<template>
  <div id="app">
    <nav class="bg-custom-blue px-6 py-3">
      <router-link to="/create-seller" class="text-white border-r border-white px-2">Criar Vendedor</router-link>
      <router-link to="/list-sellers" class="text-white border-r border-white-700 px-2">Listar Vendedores</router-link>
      <router-link to="/create-sale" class="text-white border-r border-white-700 px-2">Criar Venda</router-link>
      <router-link to="/list-sales-seller" class="text-white px-2">Listar Vendas do Vendedor</router-link>
    </nav>
    <router-view></router-view>
  </div>
  <notifications />
</template>

<script>
export default {
  name: 'App'
};
</script>

