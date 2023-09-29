import axios from "axios";

const state = {
    cuentasMyBank: {},
    cuentasPropias: {},
    cuentasTerceros: {},
    transferenciaOrigen: {},
    transferenciaDestino: {},
    transferenciaPropia: {},
}

const getters = {
    cuentasMyBank(state){
        return state.cuentasMyBank
    },

    cuentasPropias(state){
        return state.cuentasPropias
    },

    cuentasTerceros(state){
        return state.cuentasTerceros
    },

    transferenciaOrigen(state){
        return state.transferenciaOrigen
    },

    transferenciaDestino(state){
        return state.transferenciaDestino
    },

    transferenciaPropia(state){
        return state.transferenciaPropia
    },

}

const mutations = {
    SET_MYBANK (state, value) {
        state.cuentasMyBank = value
    },

    SET_PROPIAS (state, value) {
        state.cuentasPropias = value
    },

    SET_TERCEROS (state, value) {
        state.cuentasMyBank = value
    },

    SET_CUENTA_ORIGEN(state, value) {
        state.transferenciaOrigen = value
    },

    SET_CUENTA_DESTINO(state, value) {
        state.transferenciaDestino = value
    },

    SET_TRANSF_PROPIAS(state, value) {
        state.transferenciaPropia = value
    },
}
const actions = {
    getCuentasMyBank ({commit}, id_user) {
        commit('SET_MYBANK',{})
        axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-mybank/'+`${id_user}`)
            .then (response => {
                console.log(response)
                commit('SET_MYBANK',response.data[0])
            })
            .catch (error => {
                console.log(error)
            })
    },

    getCuentasPropias ({commit}, id_user) {
        commit('SET_PROPIAS',{})
        axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-propias/'+`${id_user}`)
            .then (response => {
                console.log(response)
                commit('SET_PROPIAS',response.data[0])


            })
            .catch (error => {
                console.log(error)
            })
    },

    transferenciasPropias({commit}, transf){
        commit('SET_CUENTA_DESTINO',{})
        commit('SET_CUENTA_ORIGEN', {})
        commit('SET_TRANSF_PROPIAS', {})
        axios.post(process.env.VUE_APP_API_URL + '/api/transf-propias', transf)
            .then (response => {
                commit('SET_CUENTA_ORIGEN',response.data[0][0])
                commit('SET_CUENTA_DESTINO',response.data[1][0])
                commit('SET_TRANSF_PROPIAS',response.data[2][0])
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