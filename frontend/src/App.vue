<!-- App.vue -->
<template>
  <div id="app">
    <nav>
    <RouterLink to="/create-seller">Criar Vendedor</RouterLink>
    <RouterLink to="/list-sellers">Listar Vendedor</RouterLink>
    <RouterLink to="/create-sale">Criar Venda</RouterLink>
    <RouterLink to="/list-sales-seller">Vendas do Vendedor</RouterLink>
    <router-view></router-view> 
  </nav>
  </div>
</template>

<script>
export default {
  name: 'App'
};
</script>

