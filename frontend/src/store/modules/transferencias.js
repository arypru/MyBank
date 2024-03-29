import axios from "axios";

const state = {
    cuentasMyBank: {},
    cuentasPropias: {},
    cuentasTerceros: {},
    transferenciaOrigen: {},
    transferenciaDestino: {},
    transferenciaPropia: {},
    transferencias: {},
    ingresos: {},
    egresos: {},
    loadingT: {},
    beneficiario: {},
    showBenef: false,

}

const getters = {

    showBenef(state){
        return state.showBenef
    },

    loadingT(state){
        return state.loadingT
    },

    get_beneficiario(state){
        return state.beneficiario
    },

    cuentasMyBank(state){
        return state.cuentasMyBank
    },

    transferencias(state){
        return state.transferencias
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

    ver_egresos(state){
        return state.egresos
    },

    ver_ingresos(state){
        return state.ingresos
    },
}

const mutations = {
    SET_MYBANK (state, value) {
        state.cuentasMyBank = value
    },

    SET_SHOWBENEF(state, value){
        state.showBenef = value
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

    SET_TRANSF(state, value) {
        state.transferencias = value
    },

    SET_EGRESOS(state, value) {
        state.egresos = value
    },

    SET_INGRESOS(state, value) {
        state.ingresos = value
    },

    SET_LOADINGT (state, value){
        state.loadingT = value
    },

    SET_BENEFICIARIO (state, value){
        state.beneficiario = value
    },

}

const actions = {
    getCuentasMyBank ({commit}, id_user) {
        commit('SET_LOADINGT', true)
        commit('SET_MYBANK',{})
        axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-mybank/'+`${id_user}`)
            .then (response => {
                console.log(response.data)
                commit('SET_LOADINGT', false)
                commit('SET_MYBANK',response.data)
            })
            .catch (error => {
                console.log(error)
            })
    },

    getCuentasPropias({commit}, id_user) {
        commit('SET_PROPIAS',{})
        commit('SET_LOADINGT', true)
        axios.get(process.env.VUE_APP_API_URL + '/api/ver-cuentas-propias/'+`${id_user}`)
            .then (response => {
                commit('SET_LOADINGT', false)
                commit('SET_PROPIAS',response.data)
            })
            .catch (error => {
                console.log(error)
            })
    },

    searchBeneficiarioAlias({commit}, alias){
        commit('SET_BENEFICIARIO',{})
        commit('SET_LOADINGT', true)
        commit('SET_SHOWBENEF', false)
        axios.get(process.env.VUE_APP_API_URL + '/api/beneficiario-alias/'+`${alias}`)
            .then (response => {
                console.log(response)
                commit('SET_LOADINGT', false)
                commit('SET_BENEFICIARIO',response.data[0])
                commit('SET_SHOWBENEF', true)
            })
            .catch (error => {
                console.log(error)
            })
    },

    transferenciasPropias({commit}, transf){
        commit('SET_LOADINGT', true)
        commit('SET_CUENTA_DESTINO',{})
        commit('SET_CUENTA_ORIGEN', {})
        commit('SET_TRANSF_PROPIAS', {})
        axios.post(process.env.VUE_APP_API_URL + '/api/transf-propias', transf)
            .then (response => {
                commit('SET_LOADINGT', false)
                commit('SET_CUENTA_ORIGEN',response.data[0][0])
                commit('SET_CUENTA_DESTINO',response.data[1][0])
                commit('SET_TRANSF_PROPIAS',response.data[2][0])
            })
            .catch (error => {
                console.log(error)
            })
    },

    transferenciasTerceros({commit}, transf){
        commit('SET_LOADINGT', true)
        commit('SET_CUENTA_DESTINO',{})
        commit('SET_CUENTA_ORIGEN', {})
        commit('SET_TRANSF_PROPIAS', {})
        axios.post(process.env.VUE_APP_API_URL + '/api/transf-terceros', transf)
            .then (response => {
                commit('SET_LOADINGT', false)
                commit('SET_CUENTA_ORIGEN',response.data[0][0])
                commit('SET_CUENTA_DESTINO',response.data[1][0])
                commit('SET_TRANSF_PROPIAS',response.data[2][0])
            })
            .catch (error => {
                console.log(error)
            })
    },

    verTransferencias({commit}, id_user){
        commit('SET_LOADINGT', true)
        axios.get(process.env.VUE_APP_API_URL + '/api/ver-transferencias/'+`${id_user}`)
            .then (response => {
                commit('SET_LOADINGT', false)
                console.log(response.data[0])
                commit('SET_TRANSF',response.data[0])
            })
            .catch (error => {
                console.log(error)
            })
    },

    verMovimientos({commit}, request){
        commit('SET_LOADINGT', true)
        commit('SET_EGRESOS', {})
        commit('SET_INGRESOS', {})
        axios.post(process.env.VUE_APP_API_URL + '/api/ver-movimientos', request)
            .then (response => {
                commit('SET_LOADINGT', false)
                commit('SET_EGRESOS',response.data[0].egresos)
                commit('SET_INGRESOS',response.data[0].ingreso)
            })
            .catch (error => {
                console.log(error)
            })
    },

    limpiarBeneficiario({commit}){
        commit('SET_SHOWBENEF', false)
    }
}

export default {
    namespace: true,
    state,
    getters,
    actions,
    mutations,
}