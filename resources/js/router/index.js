import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Places from '../pages/Place.index.vue'

const routes = [
  {
    path: '/places',
    name: 'place.index',
    component: Places
  },
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router