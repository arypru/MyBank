import Vue from 'vue'
import VueRouter from 'vue-router'
import VLogin from '../views/VLogin'
import VRegistro from '../views/VRegistro'
import VHome from '../views/VHome'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: VHome,
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
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
