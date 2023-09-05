import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView'
import VLogin from '../views/VLogin'
import VRegistro from '../views/VRegistro'

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
    },

    {
        path: '/registrarse',
        name: 'Registro',
        component: VRegistro,
        meta: { title: 'Registro'}
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
