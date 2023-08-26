import Vue from 'vue'
import App from './App.vue'
import main from './assets/main.css'

Vue.config.productionTip = false

new Vue({
  main,
  render: h => h(App),
}).$mount('#app')
