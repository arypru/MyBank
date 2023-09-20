import axios from "axios";
import router from '@/router'

const state = {
    user: {},
    msg: "",
    token: {},
    error: false,
    authenticated:false,
    btn_login: false,
}

const getters = {
    authenticated(state){
        return state.authenticated
    },

    message(state){
        return state.msg
    },

    token(state){
        return state.token
    },

    error(state){
        return state.error
    }
}

const mutations = {
    SET_AUTHENTICATED (state, value) {
        state.authenticated = value
    },
    SET_MSG(state, value){
        state.msg = value
    },
    SET_USER (state, value) {
        state.user = value
    },

    SET_TOKEN(state,value){
        state.token = value
    },

    SET_ERROR (state, value){
        state.error = value
    }

}
const actions = {
    login ({commit}, user) {
        console.log(user)
        axios.post(process.env.VUE_APP_API_URL + '/api/login', user)
            .then (response => {
                if(response.data.state === 'error'){
                    console.log("sfs")
                    commit('SET_MSG',response.data.message)
                    commit('SET_ERROR',true)
                    commit('SET_AUTHENTICATED',false)
                }else{
                    commit('SET_TOKEN', response.data.token)
                    commit('SET_AUTHENTICATED',true)
                    commit('SET_MSG',response.data.message)
                    commit('SET_USER',response.data.user)
                    router.push({name:'Home'})
                }
            })
            .catch (error => {
                console.log(error)
                commit('SET_ERROR',true)
                console.log(error.message)
                commit('SET_MSG',error.message)
                commit('SET_AUTHENTICATED',false)
            })
    },

    logout({commit}){
        axios.post(process.env.VUE_APP_API_URL+ '/api/logout')
            .then( response =>{
                commit('SET_TOKEN',{})
                commit('SET_USER',{})
                commit('SET_MSG',response.data.message)
                commit('SET_AUTHENTICATED',false)
                router.push({name:'Ingresar'})
            } )
            .catch (error => {
                commit('SET_ERROR',true)
                console.log(error.message)
                commit('SET_MSG',error.message)
                commit('SET_AUTHENTICATED',false)
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