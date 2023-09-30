import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '@/store'
import VLogin from '../views/VLogin'
import VRegistro from '../views/VRegistro'
import VHome from '../views/VHome'
import auth from "../middleware/auth";
import guest from "../middleware/guest";
import middlewarePipeline from "./middlewarePipeline";
import VCuentaDetalle from "../views/VCuentaDetalle"
import AppLayout from "@/layout/AppLayout";
import VRouterList from "../views/VRouterList";
import VUsuario from "../views/VUsuario";
import VTransferencias from "../views/VTransferencias"
import VNewTransferencia from "../views/VNewTransferencia"

Vue.use(VueRouter)

const routes = [

    {
        path: '/',
        component: AppLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                path: '/',
                name: 'Home',
                component: VHome,
                meta: {title: 'Inicio', middleware: [auth] }
            },
            {
                path: '/transferencias/:id',
                name: 'Transferencias',
                component: VTransferencias,
                meta: {title: 'Transferencias', middleware: [auth] }
            },
            {
                path: '/nueva-transferencia',
                name: 'Nueva Transferencia',
                component: VNewTransferencia,
                meta: {title: 'Nueva Transferencia', middleware: [auth] }
            },
            {
                path: '/detalle/:id',
                name: 'Detalle',
                component: VCuentaDetalle,
                meta: {title: 'Detalle', middleware: [auth] }
            },
            {
                path: '/usuario/:id',
                name: 'Usuario',
                component: VUsuario,
                meta: {title: 'Usuario', middleware: [auth] }
            },
        ]
    },

    {
        path: '/login',
        name: 'Ingresar',
        component: VLogin,
        meta: { title: 'Ingresar', middleware: [guest]}
    },

    {
        path: '/registrarse',
        name: 'Registro',
        component: VRegistro,
        meta: { title: 'Registro', middleware: [guest]}
    },

    {
        path: '/routes', // Ruta para mostrar las rutas
        name: 'RouteList',
        component: VRouterList,
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
    const middleware = to.meta.middleware;
    const context = { to, from, next, store };

    if (!middleware) {
        return next();
    }

    middleware[0]({
        ...context,
        next: middlewarePipeline(context, middleware, 1),
    });
});
export default router
