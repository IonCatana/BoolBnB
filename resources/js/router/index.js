import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PlacesIndex from '../pages/PlacesIndex.vue';
import PlacesShow from '../pages/PlacesShow.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';

const routes = [
  {
    path: '/',
    name: 'places.index',
    component: PlacesIndex,
  },
  {
    path: '/places_show/:slug',
    name: 'places.show',
    component: PlacesShow,
    props: true,
  },
  {
    path: '/advanced_search',
    name: 'places.advanced.search',
    component: AdvancedSearch,
  },
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router