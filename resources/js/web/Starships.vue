<template>
  <div>
    <h1 class="text-white ml-2" >Naves Espaciales</h1>
    <v-container>
      <v-row>
        <v-col v-for="ship in ships" :key="ship.id" cols="12" md="4">
          <v-card>
            <v-card-title class="d-flex align-center justify-space-between">
              <span>{{ ship.name }}</span>
              <v-icon class="mdi mdi-rocket-launch icon-xl mr-2"></v-icon> <!-- Ajusta el tamaño y el margen del icono -->
            </v-card-title>
            <v-card-text>
              <p><strong>Modelo:</strong> {{ ship.model }}</p>
              <p><strong>Fabricante:</strong> {{ ship.manufacturer }}</p>
              <p><strong>Costo en créditos:</strong> {{ ship.cost_in_credits }}</p>
              <p><strong>Longitud:</strong> {{ ship.length }}</p>
              <p><strong>Número de tripulación:</strong> {{ ship.crew }}</p>
              <p class="text-h5"><strong>Cantidad en el inventario:</strong> {{ ship.count }}</p>
              <v-btn class="mr-2" color="success" @click="incrementCount(ship.id)"> + </v-btn>
              <v-btn color="error mr-2 " @click="decrementCount(ship.id)"> - </v-btn>
              <v-btn color="info" @click="openModal(ship.id, ship.count)">Setear Cantidad</v-btn>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

    <!-- Modal -->
    <v-dialog v-model="showModal" max-width="400px">
      <v-card>
        <v-card-title class="headline">Setear Cantidad</v-card-title>
        <v-card-text>
          <v-text-field v-model="newQuantity" label="Nueva Cantidad"></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-btn
            color="success"
            text="Aceptar"
            variant="flat"
            @click="setCount"
          ></v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
  
<script>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  export default {
    setup() {
      const ships = ref([]);
      const showModal = ref(false);
      const shipId = ref(null);
      const newQuantity = ref('');
  
      const fetchShips = () => {
        axios.get('/api/starships')
        .then(response => {
          if (response.data) {
            ships.value = response.data;
          } else {
            console.error('Response data is null or undefined');
          }
        })
        .catch(error => {
          alert(error);
        });
      };
  
      const incrementCount = (id) => {
        axios.post(`/api/starships/${id}/increment`)
          .then(response => {
            fetchShips();
          })
          .catch(error => {
            alert(error);
          });
      };
  
      const decrementCount = (id) => {
        axios.post(`/api/starships/${id}/decrement`)
          .then(response => {
            fetchShips();
          })
          .catch(error => {
            alert(error);
          });
      };

      const openModal = (id, count) => {
        shipId.value = id;
        showModal.value = true;
        newQuantity.value = count;
      };

      const setCount = () => {
        axios.post(`/api/starships/${shipId.value}/set`, { quantity: newQuantity.value })
          .then(response => {
            fetchShips();
            showModal.value = false;
          })
          .catch(error => {
            alert(error);
          });
      };
  
      onMounted(fetchShips);
  
      return {
        ships,
        showModal,
        newQuantity,
        fetchShips,
        incrementCount,
        decrementCount,
        openModal,
        shipId,
        setCount
      };
    }
  };
</script>