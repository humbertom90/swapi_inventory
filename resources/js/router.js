import { createRouter, createWebHistory } from 'vue-router';
import WelcomePage from './components/WelcomePage.vue';
import StarshipsPage from './components/StarshipsPage.vue';
import VehiclesPage from './components/VehiclesPage.vue';

const routes = [
  { path: '/', component: WelcomePage },
  { path: '/starships', component: StarshipsPage },
  { path: '/vehicles', component: VehiclesPage }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;