import { createRouter, createWebHistory } from 'vue-router';
import BuscarPorCpf from '../components/BuscarPorCpf.vue';
import DetalheEntrega from '../components/DetalheEntrega.vue';

const routes = [
  { path: '/', name: 'BuscarPorCpf', component: BuscarPorCpf },
  { path: '/entrega', name: 'DetalheEntrega', component: DetalheEntrega },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
