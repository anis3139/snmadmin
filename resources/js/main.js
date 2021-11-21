import Vue from 'vue'
import VueRouter from 'vue-router';
import { BootstrapVue } from 'bootstrap-vue';
import VueFeather from 'vue-feather';
import vWow from 'v-wow';
import VueCarousel from 'vue-carousel';
import Toasted from 'vue-toasted';
import App from './App.vue'
import './assets/style/custom.scss';
import { router } from './router';
import store from './store';
import axios from "axios";
import moment from 'moment'


import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);


Vue.prototype.moment = moment

axios.defaults.baseURL='http://127.0.0.1:8000/';

Vue.config.productionTip = false

Vue.use(BootstrapVue);
Vue.use(VueFeather);
Vue.use(VueRouter);
Vue.use(vWow);
Vue.use(VueCarousel);
Vue.use(Toasted)
Vue.use(axios)




new Vue({
  store,
  router,
  render: h => h(App),
}).$mount('#app')
