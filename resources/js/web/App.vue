<template>
  <v-app>
    <Navbar />
    <v-main class="main-container">
      <div class="content">
        <router-view></router-view>
      </div>
    </v-main>
  </v-app>
</template>

<script>
import Navbar from '../components/NavBar.vue';
export default {
  components: {
    Navbar,
  }
}
</script>

<style>
.main-container {
  background-image: url('/images/background.jpg'); 
  background-size: 100% auto; /* Ajuste manual del tamaño */
  background-position: center; /* Para centrar la imagen */
}
</style>
