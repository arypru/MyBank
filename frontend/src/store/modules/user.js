import axios from "axios";

const state = {
    usuario: {},
}

const getters = {
    usuario(state){
        return state.usuario
    },

}

const mutations = {
    SET_USUARIO (state, value) {
        state.usuario = value
    },
}
const actions = {

    getConfiguracionCuenta ({commit}, id_user) {
        commit('SET_USUARIO',{})
        axios.get(process.env.VUE_APP_API_URL + '/api/user/'+`${id_user}`)
            .then (response => {
                console.log(response)
                commit('SET_USUARIO',response.data)
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