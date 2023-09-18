import axios from "axios";
import router from '@/router'

const state = {
    user: {},
    msg: {},
    token: JSON.parse(localStorage.getItem('token') || "{}" ),
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
                    commit('SET_TOKEN', response.data.token)
                    console.log(response.data.token)
                    localStorage.setItem('token',JSON.stringify(response.data.token))
                    router.push({name:'Home'})
                }
            })
            .catch (error => {
                console.log("error",error)
                commit('SET_MSG',error.data.message)
                commit('SET_AUTHENTICATED',false)
            })
    },

    logout({commit}){
        console.log("entro")
        axios.post(process.env.VUE_APP_API_URL+ '/api/logout')
            .then( response =>{
                console.log("logout")
                console.log(response)
                commit('SET_USER',{})
                commit('SET_MSG',response.data.message)
                commit('SET_AUTHENTICATED',false)
                commit('SET_TOKEN',{})
                localStorage.removeItem('token')
                router.push({name:'Ingresar'})
            } )
    }
}

export default {
    namespace: true,
    state,
    getters,
    actions,
    mutations,
}