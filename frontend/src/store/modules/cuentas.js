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
    loading: true,
}

const getters = {

    loading(state){
        return state.loading
    },

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
    },

    SET_LOADING (state, value){
        state.loading = value
    }
}
const actions = {
    async verCuentasUsuarios ({commit}, userId) {
        commit('SET_LOADING', true)
        await axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-usuarios/'+`${userId}`)
            .then (response => {
                    console.log(response)
                    commit('SET_LOADING', false)
                    commit('SET_CUENTAS', response.data.cuentas)
            })
            .catch (error => {
                console.log(error)
            })
    },

     verDetalleCuenta ({commit}, numeroCuenta) {
         commit('SET_CUENTA', {})
         commit('SET_LOADING', true)
         axios.get(process.env.VUE_APP_API_URL + '/api/ver-detalle-cuenta/'+`${numeroCuenta}`)
            .then (response => {
                commit('SET_LOADING', false)
                commit('SET_CUENTA', response.data.cuenta[0])
            })
            .catch (error => {
                console.log(error)
            })
    },

    darBajaCuenta ({commit}, idCuenta) {
        commit('SET_LOADING', true)
        axios.post(process.env.VUE_APP_API_URL + '/api/dar-baja-cuenta/'+`${idCuenta}`)
            .then (response => {
                commit('SET_LOADING', false)
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
        commit('SET_LOADING', true)
        axios.post(process.env.VUE_APP_API_URL + '/api/modificar-alias', alias)
            .then (response => {
                commit('SET_LOADING', false)
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
        commit('SET_LOADING', true)
        axios.post(process.env.VUE_APP_API_URL + '/api/modificar-descrip', alias)
            .then (response => {
                console.log(response)
                commit('SET_LOADING', false)
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