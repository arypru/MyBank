import axios from "axios";
import router from '@/router'

const state = {
    user: {},
    msg: {},
    authenticated:false,
    btn_login: false,
}

const getters = {
    authenticated(state){
        return state.authenticated
    },

    message(state){
        return state.msg
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
    }
}
const actions = {
    login ({commit}, user) {
        console.log(user)
        axios.post(process.env.VUE_APP_API_URL + '/api/login', user)
            .then (response => {
                if(response.data.message === 'error'){
                    commit('SET_MSG',response.data.message)
                    commit('SET_AUTHENTICATED',false)
                }else{
                    commit('SET_AUTHENTICATED',true)
                    commit('SET_MSG',response.data.message)
                    commit('SET_USER',response.data.user)
                    router.push({name:'Home'})
                }
            })
            .catch (error => {
                console.log("error",error)
                commit('SET_MSG',error.data.message)
                commit('SET_AUTHENTICATED',false)
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