import axios from "axios";
//import router from '@/router'

const state = {
    cuentas: {},
    user_id: ''
}

const getters = {
    cuentas(state){
        return state.cuentas
    },

}

const mutations = {
    SET_CUENTAS (state, value) {
        state.cuentas = value
    },
}
const actions = {
    async verCuentasUsuarios ({commit}, userId) {
        console.log(userId)
        await axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-usuarios/'+`${userId}`)
            .then (response => {
                    console.log(response)
                    commit('SET_CUENTAS', response.data.cuentas)
            })
            .catch (error => {
                console.log(error)
            })
    },
}

export default {
    namespace: true,
    state,
    getters,
    actions,
    mutations,
}