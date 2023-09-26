import axios from "axios";
//import router from '@/router'

const state = {
    sesionActiva: {},
    historialSesiones: ''
}

const getters = {
    sesionActiva(state){
        return state.sesionActiva
    },

    historialSesiones(state){
        return state.historialSesiones
    },
}

const mutations = {
    SET_ACTIVA (state, value) {
        state.sesionActiva = value
    },

    SET_HISTORIAL_SESIONES(state, value){
        state.historialSesiones = value
    },

}
const actions = {
    getSesionActiva ({commit}, userId) {
         commit('SET_ACTIVA',{})
         axios.get(process.env.VUE_APP_API_URL + '/api/accesoActivo/'+`${userId}`)
            .then (response => {
               commit('SET_ACTIVA', response.data)
            })
            .catch (error => {
                console.log(error)
            })
    },

    getHistorialSesiones({commit}, userId){
        commit ('SET_HISTORIAL_SESIONES',{})
        axios.get(process.env.VUE_APP_API_URL + '/api/accesos/'+`${userId}`)
            .then (response => {
                commit('SET_HISTORIAL_SESIONES', response.data)
            })
            .catch (error => {
                console.log(error)
            })
    }
}

export default {
    namespace: true,
    state,
    getters,
    actions,
    mutations,
}