import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView'
import VLogin from '../views/VLogin'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta: { title: 'Inicio'}
  },

    {
        path: '/login',
        name: 'Ingresar',
        component: VLogin,
        meta: { title: 'Ingresar'}
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
