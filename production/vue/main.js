import Vue from 'vue'
import Cabinet from './App.vue'

import Login from './components/login.vue';
import Cab from './components/cabinet.vue';
import Reg from './components/registration.vue';
Vue.component('Login', Login);
Vue.component('Cab', Cab);
Vue.component('Reg', Reg);
new Vue({
  el: '#cabinet',
  render: h => h(Cabinet)
})
