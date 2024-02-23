

<!-- <template>
  <router-link to="/">Formulario</router-link>
  <Personales></Personales>
</template> -->

<template>
  <div>
    <router-view></router-view> <!-- Agrega el componente router-view aquí -->
  </div>
</template>

<script setup>
  import Personales from './components/Personales.vue';
</script>
