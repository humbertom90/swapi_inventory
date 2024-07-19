<template>
  <div>
    <h1 class="text-white ml-2">Vehiculos</h1>
    <v-container>
      <v-row>
        <v-col v-for="vehicle in vehicles" :key="vehicle.id" cols="12" md="4">
          <v-card>
            <v-card-title class="d-flex align-center justify-space-between">
              <span>{{ vehicle.name }}</span>
              <v-icon class="mdi mdi-rocket icon-xl mr-2"></v-icon>
            </v-card-title>
            <v-card-text>
              <p><strong>Modelo:</strong> {{ vehicle.model }}</p>
              <p><strong>Fabricante:</strong> {{ vehicle.manufacturer }}</p>
              <p><strong>Clase de vehículo:</strong> {{ vehicle.vehicle_class }}</p>
              <p><strong>Largo:</strong> {{ vehicle.length }}</p>
              <p><strong>Número de tripulación:</strong> {{ vehicle.crew }}</p>
              <p class="text-h5"><strong>Cantidad en el inventario:</strong> {{ vehicle.count }}</p>
              <v-btn class="mr-2" color="success" @click="incrementCount(vehicle.id)"> + </v-btn>
              <v-btn color="error mr-2 " @click="decrementCount(vehicle.id)"> - </v-btn>
              <v-btn color="info" @click="openModal(vehicle.id, vehicle.count)">Setear Cantidad</v-btn>
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
    const vehicles = ref([]);
    const showModal = ref(false);
    const vehicleId = ref(null);
    const newQuantity = ref('');

    const fetchVehicles = () => {
      axios.get('/api/vehicles')
        .then(response => {
          if (response.data) {
            vehicles.value = response.data;
          } else {
            console.error('Response data is null or undefined');
          }
        })
        .catch(error => {
          alert(error.response.data.error);
        });
    };

    const incrementCount = (id) => {
      axios.post(`/api/vehicles/${id}/increment`)
        .then(response => {
          fetchVehicles();
        })
        .catch(error => {
          alert(error.response.data.error);
        });
    };

    const decrementCount = (id) => {
      axios.post(`/api/vehicles/${id}/decrement`)
        .then(response => {
          fetchVehicles();
        })
        .catch(error => {
          alert(error.response.data.error);
        });
    };

    const openModal = (id, count) => {
      vehicleId.value = id;
      showModal.value = true;
      newQuantity.value = count;
    };

    const setCount = () => {
      axios.post(`/api/vehicles/${vehicleId.value}/set`, { quantity: newQuantity.value })
        .then(response => {
          fetchVehicles();
          showModal.value = false;
        })
        .catch(error => {
          alert(error.response.data.error);
        });
    };

    onMounted(fetchVehicles);

    return {
      vehicles,
      showModal,
      newQuantity,
      fetchVehicles,
      incrementCount,
      decrementCount,
      openModal,
      vehicleId,
      setCount
    };
  }
};
</script>

<style scoped>
</style>