import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PlacesIndex from '../pages/PlacesIndex.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';

const routes = [
  {
    path: '/',
    name: 'place.index',
    component: PlacesIndex,
  },
  {
    path: '/advanced_search',
    name: 'advanced.search',
    component: AdvancedSearch,
  },
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router