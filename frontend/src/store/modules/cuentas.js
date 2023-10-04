import axios from "axios";
import router from "@/router";
//import router from '@/router'

const state = {
    cuentas: {},
    user_id: '',
    cuenta: {},
    openModal: false,
    msg: "ola",
    success: false,
}

const getters = {
    cuentas(state){
        return state.cuentas
    },

    success(state){
        return state.success
    },

    cuenta(state){
        return state.cuenta
    },

    mostrar_msg(state){
        return state.msg
    },

    openModal (state){
        return state.openModal
    }
}

const mutations = {
    SET_CUENTAS (state, value) {
        state.cuentas = value
    },

    SET_CUENTA(state, value){
        state.cuenta = value
    },

    SET_MODAL (state, value){
        state.openModal = value
    },

    SET_MSG (state, value){
        state.msg = value
    },

    SET_SUCCESS (state, value){
        state.success = value
    }
}
const actions = {
    async verCuentasUsuarios ({commit}, userId) {
        await axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-usuarios/'+`${userId}`)
            .then (response => {
                    console.log(response)
                    commit('SET_CUENTAS', response.data.cuentas)
            })
            .catch (error => {
                console.log(error)
            })
    },

     verDetalleCuenta ({commit}, numeroCuenta) {
         commit('SET_CUENTA', {})
         axios.get(process.env.VUE_APP_API_URL + '/api/ver-detalle-cuenta/'+`${numeroCuenta}`)
            .then (response => {
                console.log(response)
                commit('SET_CUENTA', response.data.cuenta[0])
            })
            .catch (error => {
                console.log(error)
            })
    },

    darBajaCuenta ({commit}, idCuenta) {
        console.log("dar de baja")
        axios.post(process.env.VUE_APP_API_URL + '/api/dar-baja-cuenta/'+`${idCuenta}`)
            .then (response => {
                console.log(response)
                commit('SET_MODAL', true)
                commit('SET_MSG', response.data.msg)
                router.push({name:'Home'})
            })
            .catch (error => {
                console.log(error)
            })
    },

    cerrarModal ({commit}){
        commit('SET_MODAL', false)
    },


    modificarAlias({commit}, alias){
        console.log(alias)
        axios.post(process.env.VUE_APP_API_URL + '/api/modificar-alias', alias)
            .then (response => {
                commit('SET_SUCCESS', true)
                commit('SET_CUENTA', response.data[0])
                commit('SET_MSG', "Alias cambiado con éxito")
                commit('SET_MODAL', true)


            })
            .catch (error => {
                console.log(error)
                commit('SET_SUCCESS', false)
                commit('SET_MSG', "Oops, al parecer ocurrio un error")
                commit('SET_MODAL', true)

            })
    },

    modificarDescripcion({commit}, alias){
        console.log(alias)
        axios.post(process.env.VUE_APP_API_URL + '/api/modificar-descrip', alias)
            .then (response => {
                console.log(response)
                commit('SET_SUCCESS', true)
                commit('SET_CUENTA', response.data[0])
                commit('SET_MODAL', true)
                commit('SET_MSG', "Descripción cambiada con éxito")

            })
            .catch (error => {
                console.log(error)
                commit('SET_SUCCESS', false)
                commit('SET_MODAL', true)
                commit('SET_MSG', "Oops, al parecer ocurrio un error")
            })
    },



    limpiarEstadoModal({commit}){
        commit('SET_MODAL', false)
        commit('SET_MSG', '')
        commit('SET_SUCCESS', '')
    }

}

export default {
    namespace: true,
    state,
    getters,
    actions,
    mutations,
}