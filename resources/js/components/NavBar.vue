<template>
  <v-card>
    <v-app-bar color="info">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Star Wars Inventory</v-toolbar-title>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer">
      <v-list>
        <v-list-item v-for="item in items" :key="item.name" :to="item.route">
          {{ item.name }}
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { name: 'Inicio', icon: 'Foo', route: '/' },
        { name: 'Naves Espaciales', icon: 'Bar', route: '/starships' },
        { name: 'Vehiculos', icon: 'Bar', route: '/vehicles' }
      ],
      drawer: null,
    }
  },
}
</script>

<style scoped>
</style>