import axios from "axios";

const state = {
    persona: {},
}

const getters = {
    persona(state){
        return state.persona
    },

}

const mutations = {
    SET_PERSONA (state, value) {
        state.persona = value
    },
}
const actions = {

    getInformacionPersonal ({commit}, id_user) {
        commit('SET_PERSONA',{})
        axios.get(process.env.VUE_APP_API_URL + '/api/personas/'+`${id_user}`)
            .then (response => {
                    console.log(response)
                    commit('SET_PERSONA',response.data)
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