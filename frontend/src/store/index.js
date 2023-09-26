import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
//import auth from './auth'
import auth from './modules/auth'
import cuentas from './modules/cuentas'
import persona from './modules/persona'

Vue.use(Vuex)
export default new Vuex.Store({
  plugins:[
    createPersistedState()
  ],
  modules:{
    auth,
    cuentas,
    persona
  }
})