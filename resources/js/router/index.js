import { createRouter, createWebHistory } from 'vue-router';
const HomeComponent = () => import ('../web/Home.vue');
const VehiclesComponent = () => import ('../web/Vehicles.vue');
const StarshipsComponent = () => import ('../web/Starships.vue');

const routes=[
    { path:'/', name:'home', component:HomeComponent},
    { path:'/starships', name:'starships', component:StarshipsComponent},
    { path:'/vehicles', name:'vehicles', component:VehiclesComponent}
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;