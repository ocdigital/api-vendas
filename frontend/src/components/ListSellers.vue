<template>
  <div>
    <h2>Listar Todos os Vendedores</h2>
    <ul>
      <li v-for="(vendor, index) in vendors" :key="index">{{ vendor.name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['vendors']
};
</script>
