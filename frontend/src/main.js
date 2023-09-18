import Vue from 'vue'
import './plugins/axios'
import App from './App.vue'
import main from './assets/main.css'
import router from './router'
import vuetify from './plugins/vuetify'
import axios from "axios";
import store from './store'

Vue.config.productionTip = false

Vue.use({
  install (Vue) {
    Vue.prototype.$api = axios.create({
      baseURL: process.env.VUE_APP_API_URL,
      withCredentials: true,
    })
  }
})

axios.defaults.headers.common.Authorization = `Bearer ${store.getters.token}`
console.log(axios.defaults.headers.common.Authorization)


new Vue({
  main,
  router,
  vuetify,
  store,
  render: h => h(App)
}).$mount('#app')
