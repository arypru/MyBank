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
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
        responseType: "json",

      }
    })
  }
})

axios.interceptors.request.use(function (config) {
  const token = store.getters.token

  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config;
}, function (error) {
  return Promise.reject(error);
});

new Vue({
  main,
  router,
  vuetify,
  store,
  render: h => h(App)
}).$mount('#app')
