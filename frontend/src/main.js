import Vue from 'vue'
import App from './App.vue'
import main from './assets/main.css'
import router from './router'
import vuetify from './plugins/vuetify'

Vue.config.productionTip = false

new Vue({
  main,
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app')
